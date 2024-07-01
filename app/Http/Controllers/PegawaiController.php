<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bidang;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use RealRashid\SweetAlert\Facades\Alert;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private static $title = 'Hapus Pegawai!';
    private static $text = "Anda yakin ingin menghapus?";

    public function index()
    {
        
        if (Gate::any(['admin', 'kasubag'])) {
            $pegawais = Pegawai::with(['bidang', 'user', 'berkas'])->get();

        $kolomBerkas = Schema::getColumnListing('berkas');

        // Kolom-kolom yang tidak diinginkan
        $kolomBerkasTidakDiinginkan = ['id', 'pegawai_id', 'created_at', 'updated_at'];
        
        // Menghilangkan kolom yang tidak diinginkan dari array nama kolom
        $kolomBerkas = array_diff($kolomBerkas, $kolomBerkasTidakDiinginkan);

        // Memeriksa kelengkapan berkas untuk setiap pegawai
        foreach ($pegawais as $pegawai) {
            $pegawai->kelengkapan_berkas = $pegawai->cekKelengkapanBerkas(2024, $pegawai->id);
        }

        confirmDelete(self::$title, self::$text);

        return view('admin.pegawai', [
            'pegawais' => $pegawais,
        ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah_pegawai', [
            'bidangs' => Bidang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'bidang_id' => 'required|integer',
            'pendidikan' => 'required|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'name' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string|max:10',
            'jabatan_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = new User;
        $user->nip = $request->nip;
        $user->password = Hash::make('password');
        $user->save();

        $lastUser = User::latest()->first();

        $pegawai = new Pegawai;
        $pegawai->user_id = $lastUser->id;
        $pegawai->tempat_lahir = $request->tempat_lahir;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->bidang_id = $request->bidang_id;
        $pegawai->pendidikan = $request->pendidikan;
        $pegawai->alamat = $request->alamat;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->name = $request->name;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->jabatan_id = $request->jabatan_id;

        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);
            $pegawai->foto = $imageName;
        }

        $pegawai->save();

        return redirect('/pegawai')->with('success', 'Data Pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kolom = Schema::getColumnListing('berkas');

        // Kolom-kolom yang tidak diinginkan
        $kolomTidakDiinginkan = ['id', 'pegawai_id', 'created_at', 'updated_at'];

        // Menghilangkan kolom yang tidak diinginkan dari array nama kolom
        $kolom = array_diff($kolom, $kolomTidakDiinginkan);

        confirmDelete(self::$title, self::$text);

        return view('admin.detail_pegawai', [
            'nama_kolom' => $kolom,
            'pegawai' => Pegawai::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        return view('admin.ubah_pegawai', [
            'pegawai' => $pegawai,
            'bidangs' => Bidang::all(),
            'jabatans' => Jabatan::where('bidang_id', $pegawai->bidang_id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'bidang_id' => 'required|exists:bidangs,id',
            'pendidikan' => 'required|string',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string',
            'name' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'jabatan_id' => 'required|exists:jabatans,id',
            'foto' => 'nullable|image|max:2048', // Batasi ukuran gambar sesuai kebutuhan Anda
        ]);

        if ($request->hasFile('foto')) {
            $extensionGambar = $request->file('foto')->extension();
            Storage::delete("profile/".$request->nip.'.'.$extensionGambar);
            $path = $request->file('foto')->storeAs("profile", 'foto_'.$request->nip.'.'.$extensionGambar);
            Pegawai::where('id', $id)
                    ->update([
                        'foto_profil' => $request->nip.'.'.$extensionGambar,
                    ]);
        }else{
            Pegawai::where('id', $id)
                    ->update([
                        'foto_profil' => 'profile-img.png',
                    ]);
        }

        Pegawai::where('id', $id)
                ->update($validatedData);
        
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        // Hapus pegawai berdasarkan objek $pegawai
        Pegawai::destroy($pegawai->id);

        // Redirect atau kembalikan ke halaman sebelumnya
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
