@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <h1 class=" mb-3">Nilai Kesehatan</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class=" mb-0 ">Data Nilai Kesehatan</h4>
                </div>
                @include('layouts.flash')
                @include('layouts.error_message')
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('nilai_kesehatan.create') }}" class="btn btn-primary add" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah nilai_kesehatan"> <i class="fas fa-folder-plus"></i> nilai_kesehatan Baru</a>
                </div>
                <div class="card-body">
                    <div class=" d-flex justify-content-between">
                        @include('nilai_kesehatan.datatable')
                </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection