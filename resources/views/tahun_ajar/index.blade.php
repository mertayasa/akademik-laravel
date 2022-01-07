@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Tahun Ajaran</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class=" mb-0 ">Data Tahun Ajaran</h4>
                        <a href="{{ route('tahun_ajar.create') }}" class="btn btn-primary add" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Tambah tahun_ajar"> <i class="fas fa-folder-plus"></i>
                            tahun_ajar Baru</a>
                    </div>
                    <div class="px-3">
                        @include('layouts.flash')
                        @include('layouts.error_message')
                    </div>
                    <div class="card-body">
                        <div class=" d-flex justify-content-between">
                            @include('tahun_ajar.datatable')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <span class="text-danger"> <b> <i>Catatan :</i> </b> </span> <br>
                        <ul class="mb-0">
                            <li>Hanya boleh ada satu tahun ajaran yang aktif</li> 
                            <li>Tahun ajar yang aktif akan otomatis menjadi tahun ajar default</li> 
                            <li>Data (jadwal, nilai, dll) yang ditampilkan di halaman guru, siswa dan wali akan berdasarkan tahun ajar default</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
