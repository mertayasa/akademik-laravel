
@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <h1 class=" mb-3">Detail Orang Tua</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class=" mb-0 ">Detail Orang Tua</h4>
                </div>
                <div class="card-body">
                        @include('ortu.form-show')
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('ortu.index') }}" class="btn btn-danger">Kembali</a>
                                <button class="btn btn-primary ml-3" type="submit">Simpan</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
