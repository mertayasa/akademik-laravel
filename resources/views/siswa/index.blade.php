@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <h1 class=" mb-3">{{ Auth::user()->isOrtu() ? 'Anak' : 'Siswa' }}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class=" mb-0 ">{{ Auth::user()->isOrtu() ? 'Data Anak' : 'Data Siswa' }}</h4>
                    @if (Auth::user()->isAdmin())
                        <a href="{{ route('siswa.create') }}" class="btn btn-primary add" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah siswa"> <i class="fas fa-folder-plus"></i> siswa Baru</a>
                    @endif
                </div>
                <div class="px-3">
                    @include('layouts.flash')
                    @include('layouts.error_message')
                </div>
                <div class="card-body">
                    <div class=" ">
                      @include('siswa.datatable', ['datatable_url' => Auth::user()->isOrtu() ? route('siswa.datatable_ortu') : route('siswa.datatable')])
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection