@extends('layout.master')

@section('title', 'Detail Pegawai')

@section('content')
    <div class="pagetitle">
        <h1>Detail Pegawai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Pegawai</li>
                <li class="breadcrumb-item active">Detail Pegawai</li>
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
                <div class="card py-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <img src='{{ asset("$path/$pegawai->foto_profil") }}' alt=""
                                    class="img-thumbnail mb-3">
                                <a href="{{ route('pegawai.destroy', $pegawai->id) }}" class="btn btn-sm btn-danger"
                                    data-confirm-delete="true"><i class="bi bi-trash"></i>
                                    Hapus</a>
                                <a href="/pegawai/{{ $pegawai->id }}/edit" class="btn btn-sm btn-success"><i
                                        class="bi bi-pencil"></i> Edit</a>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <h3>PROFIL</h3>
                                    <hr>
                                    <div class="col-4">
                                        <h6>NIP</h6>
                                        <h6>Nama Lengkap</h6>
                                        <h6>Tempat, Tgl Lahir</h6>
                                        <h6>Jenis Kelamin</h6>
                                        <h6>Bidang</h6>
                                        <h6>Pendidikan Terakhir</h6>
                                        <h6>Jabatan</h6>
                                        <h6>Kelompok Jabatan</h6>
                                        <h6>Alamat</h6>
                                        <h6>No Handphone</h6>
                                    </div>
                                    <div class="col-8">
                                        <h6>: {{ $pegawai->user->nip }}</h6>
                                        <h6>: {{ $pegawai->name }}</h6>
                                        <h6>: {{ $pegawai->tempat_lahir }}, {{ $pegawai->tanggal_lahir }}</h6>
                                        <h6>: {{ $pegawai->jenis_kelamin }}</h6>
                                        <h6>: {{ $pegawai->bidang->nama_bidang }}</h6>
                                        <h6 class="text-uppercase">: {{ $pegawai->pendidikan }}</h6>
                                        <h6>: {{ $pegawai->jabatan->nama }}</h6>
                                        <h6>: {{ $pegawai->jabatan->kelompok_jabatan }}</h6>
                                        <h6>: {{ $pegawai->alamat }}</h6>
                                        <h6>: {{ $pegawai->no_hp }}</h6>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <h3>BERKAS</h3>
                                    <hr>
                                    <div class="col-4">
                                        @foreach ($nama_kolom as $kolom)
                                            <h6>{{ $kolom }}</h6>
                                        @endforeach
                                    </div>
                                    <div class="col-8">
                                        @foreach ($nama_kolom as $kolom)
                                            <h6>:
                                                @if (!empty($pegawai->berkas->{$kolom}))
                                                    <a href="">{{ $pegawai->berkas->{$kolom} }}</a>
                                                @else
                                                    Dokumen tidak tersedia
                                                @endif
                                            </h6>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
