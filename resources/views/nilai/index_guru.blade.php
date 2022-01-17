@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <h1 class=" mb-3">Nilai</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class=" mb-0 ">Data Nilai</h4>
                </div>
                <div class="px-3">
                    @include('layouts.flash')
                    @include('layouts.error_message')
                </div>
                <div class="card-body">
                    @include('nilai.datatable_guru')
                </div>
            </div>
        </div>
    </div>
    <div id="raportContainer" class="d-none"></div>
</div>
@endsection

@include('nilai.js')