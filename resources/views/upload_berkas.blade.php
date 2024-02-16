@extends('layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Upload Berkas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Berkas</li>
                <li class="breadcrumb-item active">Upload</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Form Upload Berkas dengan Nilai Awal dari Database -->
                        <form action="/berkas/{{ $berkas->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                                <small class="form-text text-danger mt-3">* Hanya ekstensi file .jpeg, .png, dan .pdf yang
                                    diperbolehkan diupload.</small>
                                <small class="form-text text-danger mb-2">* Maksimal Ukuran file 5MB</small>
                                <hr>
                                <div class="col-md-6">
                                    <input type="hidden" name="pegawai_id" value="{{ $berkas->pegawai_id }}">
                                    <!-- Input KTP -->
                                    <div class="mt-2">
                                        <label for="ktp" class="form-label">KTP:</label>
                                        @if ($berkas->ktp)
                                            <a href="{{ asset('storage/berkas/' . $berkas->ktp) }}"
                                                target="_blank">{{ $berkas->ktp }}</a>
                                        @else
                                            <span class="text-danger">Berkas belum diupload</span>
                                        @endif
                                        <input type="file" class="form-control" name="ktp" id="ktp">
                                    </div>

                                    <!-- Input SK Pengangkatan -->
                                    <div class="mt-4">
                                        <label for="sk_pengangkatan" class="form-label">SK Pengangkatan:</label>
                                        @if ($berkas->sk_pengangkatan)
                                            <a href="{{ asset('storage/berkas/' . $berkas->sk_pengangkatan) }}"
                                                target="_blank">{{ $berkas->sk_pengangkatan }}</a></p>
                                        @else
                                            <span class="text-danger">Berkas belum diupload</span>
                                        @endif
                                        <input type="file" class="form-control" name="sk_pengangkatan"
                                            id="sk_pengangkatan">
                                    </div>

                                    <!-- Input SK Pangkat -->
                                    <div class="mt-4">
                                        <label for="sk_pangkat" class="form-label">SK Pangkat:</label>
                                        @if ($berkas->sk_pangkat)
                                            <a href="{{ asset('storage/berkas/' . $berkas->sk_pangkat) }}"
                                                target="_blank">{{ $berkas->sk_pangkat }}</a></p>
                                        @else
                                            <span class="text-danger">Berkas belum diupload</span>
                                        @endif
                                        <input type="file" class="form-control" name="sk_pangkat" id="sk_pangkat">
                                    </div>

                                    <!-- Input SK Berkala -->
                                    <div class="mt-4">
                                        <label for="sk_berkala" class="form-label">SK Berkala:</label>
                                        @if ($berkas->sk_berkala)
                                            <a href="{{ asset('storage/berkas/' . $berkas->sk_berkala) }}"
                                                target="_blank">{{ $berkas->sk_berkala }}</a></p>
                                        @else
                                            <span class="text-danger">Berkas belum diupload</span>
                                        @endif
                                        <input type="file" class="form-control" name="sk_berkala" id="sk_berkala">
                                    </div>

                                    <!-- Input SK Jabatan -->
                                    <div class="mt-4">
                                        <label for="sk_jabatan" class="form-label">SK Jabatan:</label>
                                        @if ($berkas->sk_jabatan)
                                            <a href="{{ asset('storage/berkas/' . $berkas->sk_jabatan) }}"
                                                target="_blank">{{ $berkas->sk_jabatan }}</a></p>
                                        @else
                                            <span class="text-danger">Berkas belum diupload</span>
                                        @endif
                                        <input type="file" class="form-control" name="sk_jabatan" id="sk_jabatan">
                                    </div>

                                    <!-- Input Ijazah -->
                                    <div class="mt-4">
                                        <label for="ijazah" class="form-label">Ijazah:</label>
                                        @if ($berkas->ijazah)
                                            <a href="{{ asset('storage/berkas/' . $berkas->ijazah) }}"
                                                target="_blank">{{ $berkas->ijazah }}</a></p>
                                        @else
                                            <span class="text-danger">Berkas belum diupload</span>
                                        @endif
                                        <input type="file" class="form-control" name="ijazah" id="ijazah">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <!-- Input SK Tugas/Ijin Belajar -->
                                    <div class="mt-4">
                                        <label for="sk_tugas_ijin_belajar" class="form-label">SK Tugas/Ijin Belajar:</label>
                                        @if ($berkas->sk_tugas_ijin_belajar)
                                            <a href="{{ asset('storage/berkas/' . $berkas->sk_tugas_ijin_belajar) }}"
                                                target="_blank">{{ $berkas->sk_tugas_ijin_belajar }}</a></p>
                                        @else
                                            <span class="text-danger">Berkas belum diupload</span>
                                        @endif
                                        <input type="file" class="form-control" name="sk_tugas_ijin_belajar"
                                            id="sk_tugas_ijin_belajar">
                                    </div>

                                    <!-- Input SK Impassing -->
                                    <div class="mt-4">
                                        <label for="sk_impassing" class="form-label">SK Impassing:</label>
                                        @if ($berkas->sk_impassing)
                                            <a href="{{ asset('storage/berkas/' . $berkas->sk_impassing) }}"
                                                target="_blank">{{ $berkas->sk_impassing }}</a></p>
                                        @else
                                            <span class="text-danger">Berkas belum diupload</span>
                                        @endif
                                        <input type="file" class="form-control" name="sk_impassing" id="sk_impassing">
                                    </div>

                                    <!-- Input SK Mutasi -->
                                    <div class="mt-4">
                                        <label for="sk_mutasi" class="form-label">SK Mutasi:</label>
                                        @if ($berkas->sk_mutasi)
                                            <a href="{{ asset('storage/berkas/' . $berkas->sk_mutasi) }}"
                                                target="_blank">{{ $berkas->sk_mutasi }}</a></p>
                                        @else
                                            <span class="text-danger">Berkas belum diupload</span>
                                        @endif
                                        <input type="file" class="form-control" name="sk_mutasi" id="sk_mutasi">
                                    </div>

                                    <!-- Input Sumpah Pegawai -->
                                    <div class="mt-4">
                                        <label for="sumpah_pegawai" class="form-label">Sumpah Pegawai:</label>
                                        @if ($berkas->sumpah_pegawai)
                                            <a href="{{ asset('storage/berkas/' . $berkas->sumpah_pegawai) }}"
                                                target="_blank">{{ $berkas->sumpah_pegawai }}</a></p>
                                        @else
                                            <span class="text-danger">Berkas belum diupload</span>
                                        @endif
                                        <input type="file" class="form-control" name="sumpah_pegawai"
                                            id="sumpah_pegawai">
                                    </div>

                                    <!-- Input Sertifikat Kediklatan -->
                                    <div class="mt-4">
                                        <label for="sertifikat_kediklatan" class="form-label">Sertifikat
                                            Kediklatan:</label>
                                        @if ($berkas->sertifikat_kediklatan)
                                            <a href="{{ asset('storage/berkas/' . $berkas->sertifikat_kediklatan) }}"
                                                target="_blank">{{ $berkas->sertifikat_kediklatan }}</a></p>
                                        @else
                                            <span class="text-danger">Berkas belum diupload</span>
                                        @endif
                                        <input type="file" class="form-control" name="sertifikat_kediklatan"
                                            id="sertifikat_kediklatan">
                                    </div>

                                    <!-- Input SKP -->
                                    <div class="mt-4">
                                        <label for="skp" class="form-label">SKP:</label>
                                        @if ($berkas->skp)
                                            <a href="{{ asset('storage/berkas/' . $berkas->skp) }}"
                                                target="_blank">{{ $berkas->skp }}</a></p>
                                        @else
                                            <span class="text-danger">Berkas belum diupload</span>
                                        @endif
                                        <input type="file" class="form-control" name="skp" id="skp">
                                    </div>
                                </div>
                            </div>
                            <!-- Tombol Upload -->
                            <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-upload"></i>
                                Upload</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
