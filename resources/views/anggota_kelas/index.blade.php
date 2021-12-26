@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class=" mb-0 ">Data Anggota Siswa Kelas {{ $id_kelas }}</h2>
                    </div>
                    @include('layouts.flash')
                    @include('layouts.error_message')
                    {{-- <div class="card-header d-flex justify-content-end">
                        <a href="{{ route('anggota_kelas.create', [$id_kelas, $id_tahun_ajar]) }}"
                            class="btn btn-primary add" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Tambah anggota_kelas"> <i class="fas fa-folder-plus"></i> Anggota Kelas Baru</a>
                    </div> --}}
                    <div class="card-body">
                        <div class="bs-example">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#siswa" class="nav-link active" data-toggle="tab">Data Siswa</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#jadwal" class="nav-link" data-toggle="tab">Jadwal Pelajaran</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#wali" class="nav-link" data-toggle="tab">Wali Kelas</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="siswa">
                                    <div class="card-body px-0">
                                        <div class="card-header d-flex justify-content-end">
                                            <a href="{{ route('anggota_kelas.create', [$id_kelas, $id_tahun_ajar]) }}"
                                                class="btn btn-primary add" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Tambah anggota_kelas"> <i
                                                    class="fas fa-folder-plus"></i> Anggota Kelas Baru</a>
                                        </div>
                                        @include('anggota_kelas.datatable')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="jadwal">
                                    <div class="card-body px-0">
                                        {{-- @include('wali_kelas.datatable') --}}
                                        @include('jadwal.datatable')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="wali">
                                    <div class="card-body px-0">
                                        @if (isset($wali_kelas))
                                            @include('wali_kelas.form-show')
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="history.back()" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
