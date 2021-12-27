@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Ekstrakulikuler</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ekstrakulikuler Baru</h5>
                </div>
                <div class="card-body pt-0">
                    @include('layouts.flash')
                        @include('layouts.error_message')
                        {!! Form::open(['route' => 'ekskul.store']) !!}
                        @include('ekskul.form')
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('ekskul.index') }}" class="btn btn-danger">Kembali</a>
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

