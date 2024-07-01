<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBerkasRequest;
use App\Http\Requests\UpdateBerkasRequest;

class BerkasController extends Controller
{
    public function downloadBerkas($id, $kolom)
    {
        // Cari pegawai berdasarkan ID
        $berkas = Berkas::findOrFail($id);

        // dd($berkas);

        // Pastikan berkas ada dan dapat diakses
        if (!Storage::exists($berkas->$kolom)) {
            abort(404); // Berkas tidak ditemukan
        }

        // Mengatur header respons
        $headers = [
            'Content-Type' => 'application/pdf', // Sesuaikan tipe berkas dengan kebutuhan Anda
        ];

        // Mengunduh berkas
        return response()->download(storage_path("app/public/$berkas->ktp"),  $berkas->ktp, $headers);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendapatkan tahun yang tersedia dalam tabel 'berkas'
        $years = DB::table('berkas')
            ->select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun')
            ->toArray();
    
        // Mendapatkan 3 tahun terakhir
        $currentYear = date('Y');
        $recentYears = [];
        for ($i = 0; $i < 3; $i++) {
            $year = $currentYear - $i;
            if (!in_array($year, $years)) {
                $years[] = $year;
            }
            $recentYears[] = $year;
        }
        
        // Mengurutkan recentYears dalam urutan menurun
        rsort($recentYears);
    
        // Mendapatkan tahun yang dipilih dari query string, atau tahun saat ini jika tidak ada
        $selectedYear = $request->input('tahun', $currentYear);
    
        // Mengecek apakah berkas untuk tahun yang dipilih sudah ada
        $berkas = Berkas::where('tahun', $selectedYear)
                        ->where('pegawai_id', Auth::user()->pegawai->id)->get();
    
        if ($berkas->isEmpty()) {
            // Jika berkas tidak ada, tambahkan berkas baru dengan tahun yang dipilih
            $berkasBaru = new Berkas();
            $berkasBaru->tahun = $selectedYear;
            $berkasBaru->pegawai_id = Auth::user()->pegawai->id;
            $berkasBaru->save();
    
            // Mengambil kembali data berkas setelah penambahan
            $berkas = Berkas::where('tahun', $selectedYear)
                ->where('pegawai_id', Auth::user()->pegawai->id)->get();
        }
    
        // Kolom yang akan ditampilkan
        $kolom = ['ktp', 'sk_pengangkatan', 'sk_pangkat', 'sk_berkala', 'sk_jabatan', 'ijazah', 'sk_tugas_ijin_belajar', 'sk_impassing', 'sk_mutasi', 'sumpah_pegawai', 'sertifikat_kediklatan', 'skp'];
    
        return view('berkas', compact('berkas', 'kolom', 'recentYears', 'selectedYear'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBerkasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Berkas $berkas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('upload_berkas', [
            'berkas' => Berkas::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vaidated_data = $request->validate([
            'ktp' => 'nullable|mimes:jpeg,png,pdf|max:5120', // Maksimum 5 MB
            'sk_pengangkatan' => 'nullable|mimes:jpeg,png,pdf|max:5120', // Maksimum 5 MB
            'sk_pangkat' => 'nullable|mimes:jpeg,png,pdf|max:5120', // Maksimum 5 MB
            'sk_berkala' => 'nullable|mimes:jpeg,png,pdf|max:5120', // Maksimum 5 MB
            'sk_jabatan' => 'nullable|mimes:jpeg,png,pdf|max:5120', // Maksimum 5 MB
            'ijazah' => 'nullable|mimes:jpeg,png,pdf|max:5120', // Maksimum 5 MB
            'sk_tugas_ijin_belajar' => 'nullable|mimes:jpeg,png,pdf|max:5120', // Maksimum 5 MB
            'sk_impassing' => 'nullable|mimes:jpeg,png,pdf|max:5120', // Maksimum 5 MB
            'sk_mutasi' => 'nullable|mimes:jpeg,png,pdf|max:5120', // Maksimum 5 MB
            'sumpah_pegawai' => 'nullable|mimes:jpeg,png,pdf|max:5120', // Maksimum 5 MB
            'sertifikat_kediklatan' => 'nullable|mimes:jpeg,png,pdf|max:5120', // Maksimum 5 MB
            'skp' => 'nullable|mimes:jpeg,png,pdf|max:5120', // Maksimum 5 MB
        ]);

        $kolom = [
            'ktp',
            'sk_pengangkatan',
            'sk_pangkat',
            'sk_berkala',
            'sk_jabatan',
            'ijazah',
            'sk_tugas_ijin_belajar',
            'sk_impassing',
            'sk_mutasi',
            'sumpah_pegawai',
            'sertifikat_kediklatan',
            'skp',
        ];

        $berkas = Berkas::findOrFail($id);
        $pegawai = Pegawai::findOrFail($request->pegawai_id);

        foreach ($kolom as $column) {
            if ($request->hasFile($column)) {
                $extensionGambar = $request->file($column)->extension();
                if ($berkas[$column] != null) {
                    Storage::delete($berkas[$column]);
                }
                $berkas->pegawai_id = $request->pegawai_id;
                $berkas->$column = $request->file($column)->storeAs("berkas/$column", $column.'_'.$pegawai->user->nip.'.'.$extensionGambar);
            }
        }

        $berkas->save();

        return redirect()->route('berkas.index')->with('success', 'Berkas Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berkas $berkas)
    {
        //
    }
}
