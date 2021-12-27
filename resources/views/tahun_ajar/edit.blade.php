
@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <h1 class=" mb-3">Tahun Ajaran</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class=" mb-0 ">Edit Tahun Ajaran</h4>
                </div>
                <div class="card-body pt-0">
                    @include('layouts.flash')
                        @include('layouts.error_message')
                        {!! Form::model($tahun_ajar, ['route' => ['tahun_ajar.update', $tahun_ajar->id], 'method' => 'patch']) !!}
                        @include('tahun_ajar.form')
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('tahun_ajar.index') }}" class="btn btn-danger">Kembali</a>
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
