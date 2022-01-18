@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Nilai</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['method' => 'get']) !!}
                        <div class="row align-items-end">
                            <div class="col-12 col-md-6 pb-3 pb-md-0">
                                {!! Form::label('user', 'Nama Siswa', ['class' => 'mb-1']) !!}
                                {!! Form::select('id_siswa', ['' => 'Pilih Siswa'] + $siswa->toArray(), $id_siswa ?? null, ['class' => 'form-control', 'id' => 'filterSiswa', 'autocomplete' => 'off']) !!}
                            </div>
                            <div class="col-12 col-md-6 pb-3 pb-md-0">
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="containerJadwal">
                            @if (isset($groupped_jadwal))
                                @include('jadwal.table')
                            @else
                                <p class="text-center mb-0">Tidak ada data jadwal</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
