<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Hash;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $data = Pegawai::with('bidang')->find(auth()->user()->id);
        return view('profile', [
            'data' => $data,
        ]);
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Password berhasil diubah');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->foto);
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'fullName' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        // Ganti nilai null dengan '-'
        foreach ($validatedData as $key => $value) {
            if (is_null($value)) {
                $validatedData[$key] = '-';
            }
        }
    
        // Memperbarui data pegawai
        Pegawai::where('id', $id)
                ->update([
                    'name' => $validatedData['fullName'],
                    'no_hp' => $validatedData['phone'],
                    'alamat' => $validatedData['alamat'],
                    'jenis_kelamin' => $validatedData['jenis_kelamin'],
                ]);
    
        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
