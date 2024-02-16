<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Pegawai;
use App\Http\Requests\StoreBerkasRequest;
use App\Http\Requests\UpdateBerkasRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

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
    public function index()
    {
        $berkas = Berkas::firstOrCreate(
            ['pegawai_id' => auth()->user()->id],
        );

        $kolomBerkas = Schema::getColumnListing('berkas');

        // Kolom-kolom yang tidak diinginkan
        $kolomBerkasTidakDiinginkan = ['id', 'pegawai_id', 'created_at', 'updated_at'];
        
        // Menghilangkan kolom yang tidak diinginkan dari array nama kolom
        $kolomBerkas = array_diff($kolomBerkas, $kolomBerkasTidakDiinginkan);
        
        return view('berkas', [
            'berkas'=> $berkas,
            'kolom'=> $kolomBerkas
        ]);
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
