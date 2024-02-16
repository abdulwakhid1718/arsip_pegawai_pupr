@extends('layout.master')

@section('title', 'Data Pegawai')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Pegawai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Pegawai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 mt-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="pegawai/create" class="btn btn-primary mb-3"><i class="bi bi-plus"></i>
                                        Tambah Pegawai</a>
                                    <table id="dataPegawai" class="table table-striped dataTable dtr-inline collapsed"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="No: activate to sort column descending">
                                                    No</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="NIP: activate to sort column descending">
                                                    NIP</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Nama Lengkap: activate to sort column ascending">
                                                    Nama Lengkap</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Bidang: activate to sort column ascending">
                                                    Bidang
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Bidang: activate to sort column ascending">
                                                    Jabatan
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Kelengkapan Berkas: activate to sort column ascending">
                                                    Berkas</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    style="display: none;">#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pegawais as $i => $pegawai)
                                                <tr
                                                    class="@if ($i + (1 % 2)) == 0) odd
                                                    @else even @endif
                                                ">
                                                    <td class="dtr-control sorting_1" tabindex="0">{{ $i + 1 }}
                                                    </td>
                                                    <td>{{ $pegawai->user->nip }}</td>
                                                    <td>{{ $pegawai->name }}</td>
                                                    <td>{{ $pegawai->bidang->nama_bidang }}</td>
                                                    <td>{{ $pegawai->jabatan->nama }}</td>
                                                    {{-- @dd($pegawai) --}}
                                                    <td><small
                                                            class="badge bg-{{ $pegawai->kelengkapan_berkas['badge'] }}">{{ $pegawai->kelengkapan_berkas['status'] }}</small>
                                                    </td>
                                                    @can('admin')
                                                        <td class="d-lg-flex gap-1">
                                                            <a href="{{ route('pegawai.destroy', $pegawai->id) }}"
                                                                class="btn btn-sm btn-danger" data-confirm-delete="true"><i
                                                                    class="bi bi-trash"></i></a>
                                                            <a href="/pegawai/{{ $pegawai->id }}"
                                                                class="btn btn-sm btn-primary"><i
                                                                    class="bi bi-info-circle"></i></a>
                                                            <a href="/pegawai/{{ $pegawai->id }}/edit"
                                                                class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>
                                                        </td>
                                                    @endcan
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">No</th>
                                                <th rowspan="1" colspan="1">NIP</th>
                                                <th rowspan="1" colspan="1">Nama Lengkap</th>
                                                <th rowspan="1" colspan="1">Bidang</th>
                                                <th rowspan="1" colspan="1">Jabatan</th>
                                                <th rowspan="1" colspan="1">Berkas</th>
                                                <th rowspan="1" colspan="1">#</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
