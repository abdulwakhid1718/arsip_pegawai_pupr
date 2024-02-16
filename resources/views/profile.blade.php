@extends('layout/master')

@section('title', 'Profile')
@section('content')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        @if ($data->foto_profil === 'profile-img.png')
                            @php
                                $path = 'img';
                            @endphp
                        @else
                            @php
                                $path = 'storage/profile';
                            @endphp
                        @endif
                        <div style="background: white; width: 120px; height: 120px; border-radius: 50%; overflow:hidden;">
                            <img src='{{ asset("$path/$data->foto_profil") }}' alt="Profile">
                        </div>

                        <div class="row text-center gap-2">
                            <h2>{{ $data->name }}</h2>
                            <h3>{{ $data->jabatan->nama }}</h3>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-xl-8">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"
                                    aria-selected="true" role="tab">Profil</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit"
                                    aria-selected="false" tabindex="-1" role="tab">Edit Profile</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password"
                                    aria-selected="false" tabindex="-1" role="tab">Ganti Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
                                <h5 class="card-title">Detail Profil</h5>

                                <div class="row">
                                    <div class="col-lg-4 label">NIP</div>
                                    <div class="col-lg-8">{{ $data->user->nip }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 label ">Nama Lengkap</div>
                                    <div class="col-lg-8">{{ $data->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 label ">Tempat, tgl lahir</div>
                                    <div class="col-lg-8">{{ $data->tempat_lahir }}, {{ $data->tanggal_lahir }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 label">Bidang</div>
                                    <div class="col-lg-8">{{ $data->bidang->nama_bidang }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 label">Jabatan</div>
                                    <div class="col-lg-8">{{ $data->jabatan->nama }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 label">Jenis Kelamin</div>
                                    <div class="col-lg-8">{{ $data->jenis_kelamin }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 label">Pendidikan Terakhir</div>
                                    <div class="col-lg-8 text-uppercase">{{ $data->pendidikan }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 label">Alamat</div>
                                    <div class="col-lg-8">{{ $data->alamat != null ? $data->alamat : '-' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 label">No Telepon</div>
                                    <div class="col-lg-8">{{ $data->no_hp != null ? $data->no_hp : '-' }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">

                                <!-- Profile Edit Form -->
                                <form method="POST" action="/profile/{{ $data->id }}" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="nip" value="{{ $data->user->nip }}" />
                                    <div class="row mb-3">
                                        <label for="profileImg" class="col-md-4 col-lg-3 col-form-label"> Foto
                                            Profil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img id="profileImg" src='{{ asset("$path/$data->foto_profil") }}'
                                                alt="Profile">
                                            <div class="pt-2">
                                                <input type="file" onchange="previewImage(event)" name="foto"
                                                    id="foto" style="">
                                                <a href="#" class="btn btn-primary btn-sm"
                                                    title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <span class="btn btn-danger btn-sm" onclick="deletePreview()"><i
                                                        class="bi bi-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama
                                            Lengkap</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fullName" type="text" class="form-control" id="fullName"
                                                value="{{ $data->name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Bidang</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="country" type="text" class="form-control" id="Country"
                                                value="{{ $data->bidang->nama_bidang }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Jabatan</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="jabatan" type="text" class="form-control" id="jabatan"
                                                value="{{ $data->jabatan->nama }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Jenis
                                            Kelamin</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select class="form-select" name="jenis_kelamin"
                                                aria-label="Default select example">
                                                <option value="Laki-Laki"
                                                    @if ($data->jenis_kelamin == 'Laki-Laki') selected @endif>
                                                    Laki-Laki</option>
                                                <option value="Perempuan"
                                                    @if ($data->jenis_kelamin == 'Perempuan') selected @endif>
                                                    Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="alamat" class="form-control" id="alamat" style="height: 100px">{{ $data->alamat != null ? $data->alamat : '-' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">No Telepon</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone"
                                                value="{{ $data->no_hp != null ? $data->no_hp : '-' }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                                <!-- Change Password Form -->
                                <form method="POST" action="/change-password">
                                    @csrf
                                    <div class="row mb-2">
                                        <label for="passwordLama" class="col-sm-8 col-form-label">Password Lama</label>
                                        <div class="col-sm-6 input-group">
                                            <input type="password" id="passwordLama"
                                                class="form-control @error('current_password') is-invalid @enderror"
                                                name="current_password">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="togglePasswordLama">
                                                <i class="bi bi-eye-slash-fill"></i>
                                            </button>
                                            @error('current_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="ubahPassword" class="col-sm-8 col-form-label">Password Baru</label>
                                        <div class="col-sm-6 input-group">
                                            <input type="password" id="ubahPassword"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="togglePasswordBaru">
                                                <i class="bi bi-eye-slash-fill"></i>
                                            </button>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="confirmPassword" class="col-sm-8 col-form-label">Konfirmasi Password
                                            Baru</label>
                                        <div class="col-sm-6 input-group">
                                            <input type="password" id="confirmPassword"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="toggleKonfirmasiPassword">
                                                <i class="bi bi-eye-slash-fill"></i>
                                            </button>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn btn-primary" name="submit">Ubah
                                            Password</button>
                                    </div>

                                </form>
                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        // Fungsi untuk menampilkan atau menyembunyikan kata sandi
        function togglePassword(inputId, buttonId) {
            var passwordInput = document.getElementById(inputId);
            var passwordButton = document.getElementById(buttonId);

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordButton.innerHTML = '<i class="bi bi-eye-fill" aria-hidden="true"></i>';
            } else {
                passwordInput.type = "password";
                passwordButton.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
            }
        }

        // Menambahkan event listener untuk tombol Password Lama
        document.getElementById("togglePasswordLama").addEventListener("click", function() {
            togglePassword("passwordLama", "togglePasswordLama");
        });

        // Menambahkan event listener untuk tombol Password Baru
        document.getElementById("togglePasswordBaru").addEventListener("click", function() {
            togglePassword("ubahPassword", "togglePasswordBaru");
        });

        // Menambahkan event listener untuk tombol Konfirmasi Password Baru
        document.getElementById("toggleKonfirmasiPassword").addEventListener("click", function() {
            togglePassword("confirmPassword", "toggleKonfirmasiPassword");
        });
    </script>
@endsection
