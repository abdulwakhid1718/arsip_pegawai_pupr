@extends('layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Ubah Data Pegawai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Pegawai</li>
                <li class="breadcrumb-item active">Ubah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if ($pegawai->foto_profil === 'profile-img.png')
        @php
            $path = 'img';
        @endphp
    @else
        @php
            $path = 'storage/profile';
        @endphp
    @endif

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Form Upload Berkas dengan Nilai Awal dari Database -->
                        <form action="/pegawai/{{ $pegawai->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                                    <div class="mt-4">
                                        <label for="nip" class="form-label">NIP:</label>
                                        <input type="text" class="form-control" name="nip" id="nip"
                                            value="{{ $pegawai->user->nip }}" disabled>
                                    </div>

                                    <div class="mt-4">
                                        <label for="tempat_lahir" class="form-label">Tempat, Tanggal Lahir:</label>
                                        <div class="input-group">
                                            <input type="text" name="tempat_lahir" class="form-control"
                                                placeholder="Masukan Kota" aria-label="Username"
                                                value="{{ $pegawai->tempat_lahir }}">
                                            <span class="input-group-text">,</span>
                                            <input type="date" name="tanggal_lahir" class="form-control"
                                                placeholder="Server" aria-label="Server"
                                                value="{{ $pegawai->tanggal_lahir }}">
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <label for="bidang_id" class="form-label">Bidang:</label>
                                        <select class="form-select" name="bidang_id" id="bidang_id"
                                            aria-label="Default select example">
                                            @foreach ($bidangs as $bidang)
                                                <option @if ($pegawai->bidang_id == $bidang->id) selected @endif
                                                    value="{{ $bidang->id }}">{{ $bidang->nama_bidang }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <label for="pendidikan" class="form-label">Pendidikan Terakhir:</label>
                                        <select class="form-select" name="pendidikan" id="pendidikan"
                                            aria-label="Default select example">
                                            <option @if ($pegawai->pendidikan == 'S2') selected @endif value="S2">S2
                                            </option>
                                            <option @if ($pegawai->pendidikan == 'S1/D4') selected @endif value="S1/D4">S1/D4
                                            </option>
                                            <option @if ($pegawai->pendidikan == 'D3') selected @endif value="D3">D3
                                            </option>
                                            <option @if ($pegawai->pendidikan == 'D1/D2/SLTA/Sederajat') selected @endif
                                                value="D1/D2/SLTA/Sederajat">D1/D2/SLTA/Sederajat
                                            </option>
                                            <option @if ($pegawai->pendidikan == 'Di Bawah SLTA') selected @endif value="Di Bawah SLTA">
                                                Di Bawah SLTA
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" placeholder="Tulis Alamat Lengkap" id="alamat" name="alamat" style="height: 100px;">{{ $pegawai->alamat }}</textarea>
                                    </div>

                                    <div class="mt-4">
                                        <label for="no_hp" class="form-label">No. Handphone/WA:</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping">+62</span>
                                            <input type="text" class="form-control" placeholder="08xxxx"
                                                aria-label="No_HP" id="no_hp" name="no_hp"
                                                aria-describedby="addon-wrapping" value="{{ $pegawai->no_hp }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mt-4">
                                        <label for="name" class="form-label">Nama Lengkap:</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Masukan Nama Lengkap" value="{{ $pegawai->name }}">
                                    </div>

                                    <div class="mt-4">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                                        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin"
                                            aria-label="Default select example">
                                            <option @if ($pegawai->jenis_kelamin == 'Laki-Laki') selected @endif value="Laki-Laki">
                                                Laki-Laki</option>
                                            <option @if ($pegawai->jenis_kelamin == 'Perempuan') selected @endif value="Perempuan">
                                                Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <label for="jabatan_id" class="form-label">Jabatan:</label>
                                        <select class="form-select" name="jabatan_id" id="jabatan_id"
                                            aria-label="Default select example">
                                            @foreach ($jabatans as $jabatan)
                                                <option @if ($pegawai->jabatan_id == $jabatan->id) selected @endif
                                                    value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <label for="profileImg" class="d-block form-label"> Foto
                                            Profil</label>
                                        <img id="profileImg" src='{{ asset("$path/$pegawai->foto_profil") }}'
                                            alt="Profile" class="img-thumbnail" width="200">
                                        <div class="pt-2 input-group">
                                            <input type="file" onchange="previewImage(event)" class="form-control"
                                                name="foto" id="foto" aria-describedby="inputGroupFileAddon04"
                                                aria-label="Upload">
                                            <span class="btn btn-danger btn-sm" id="foto"
                                                onclick="deletePreview()"><i class="bi bi-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tombol Upload -->
                            <button type="submit" class="btn btn-primary mt-4"><i class="bi bi-pencil"></i>
                                Ubah Data</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
