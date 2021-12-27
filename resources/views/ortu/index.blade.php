@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <h1 class=" mb-3">Orang Tua</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class=" mb-0 ">Data Orang Tua</h4>
                    <a href="{{ route('ortu.create') }}" class="btn btn-primary add" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah ortu"> <i class="fas fa-folder-plus"></i> ortu Baru</a>
                </div>
                <div class="px-3">
                    @include('layouts.flash')
                    @include('layouts.error_message')
                </div>
                <div class="card-body">
                    <div class=" d-flex justify-content-between">
                        @include('ortu.datatable')
                </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection