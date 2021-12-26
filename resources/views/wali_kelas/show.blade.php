@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Wali Kelas</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=" mb-0 ">Data Wali Kelas</h4>
                    </div>
                    <div class="card-body">
                        <div class=" d-flex justify-content-between">
                            @if (isset($wali_kelas))
                                @include('wali_kelas.form-show')
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
