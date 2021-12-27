@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Prestasi</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Prestasi Baru</h5>
                </div>
                <div class="card-body pt-0">
                    @include('layouts.flash')
                        @include('layouts.error_message')
                        {!! Form::open(['route' => 'prestasi.store']) !!}
                        @include('prestasi.form')
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('prestasi.index') }}" class="btn btn-danger">Kembali</a>
                                <button class="btn btn-primary ml-3" type="submit">Simpan</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

