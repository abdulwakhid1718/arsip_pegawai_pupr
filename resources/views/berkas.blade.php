@extends('layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Berkas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Berkas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4 mt-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="berkas/{{ $berkas->id }}/edit" class="btn btn-success mb-3"><i
                                            class="bi bi-upload"></i>
                                        Upload
                                        Berkas</a>
                                    <table id="dataBerkas"
                                        class="table table-bordered table-striped dataTable dtr-inline collapsed"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>

                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Jenis Berkas: activate to sort column descending">
                                                    Jenis Berkas</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Berkas: activate to sort column ascending">
                                                    Berkas</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="#: activate to sort column ascending">
                                                    #
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kolom as $i => $kolomBerkas)
                                                <tr
                                                    class="@if ($i - (1 % 2)) == 0) odd
                                                    @else even @endif
                                                ">
                                                    <td>{{ $kolomBerkas }}</td>
                                                    <td>
                                                        @if (empty($berkas[$kolomBerkas]))
                                                            <span class="text-danger">Berkas Belum diupload</span>
                                                        @else
                                                            <a
                                                                href="/berkas/{{ $berkas->id }}/download/{{ $kolomBerkas }}">{{ $berkas[$kolomBerkas] }}</a>
                                                        @endif
                                                    </td>

                                                    <td class="d-lg-flex gap-1">
                                                        <a href="/pegawai/{{ $kolomBerkas }}"
                                                            class="btn btn-sm btn-danger"><i class="bi bi-eye"></i></a>
                                                        <a href="/pegawai/{{ $kolomBerkas }}"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="bi bi-download"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Jenis Berkas</th>
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
