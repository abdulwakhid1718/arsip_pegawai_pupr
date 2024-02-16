@extends('layout.master')

@section('title', 'Beranda')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mt-4">
                            <div class="flex-grow-1">
                                <h3 class="font-weight-bolder">Hallo! {{ auth()->user()->pegawai->name }}</h3>
                                <p class="fs-6 text-muted m-0">Selamat Datang di Sistem Kepegawaian Dinas Pekerjaan
                                    Umum & Penataan Ruang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card o-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mt-4">
                            <div class="flex-grow-1">
                                <h5 class="mb-3 font-weight-bold"><strong>Kelengkapan Data</strong></h5>
                                {{-- @dd($status) --}}
                                <div class="alert alert-{{ $status[1] }}" role="alert">
                                    <span>Profil Pegawai <strong>{{ $status[0] }}</strong></span>
                                    @if ($status[0] == 'Belum Lengkap')
                                        <span class="d-block mt-3" style="font-size:0.8rem">Lengkapi pada halaman : <a
                                                href="/profile" class="btn btn-sm btn-primary">profile</a></span>
                                    @endif
                                </div>
                                <div class="alert alert-{{ $kelengkapan_berkas['badge'] }}" role="alert">
                                    <span>Berkas Pegawai
                                        <strong>{{ $kelengkapan_berkas['status'] }}</strong></span>
                                    @if ($kelengkapan_berkas['status'] == 'Belum Lengkap')
                                        <span class="d-block mt-3" style="font-size:0.8rem">Lengkapi pada halaman : <a
                                                href="/berkas" class="btn btn-sm btn-primary">berkas</a></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
