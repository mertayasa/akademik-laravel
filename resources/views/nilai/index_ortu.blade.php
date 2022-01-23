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
                        <div id="containerNilai">
                            @if (isset($nilai))
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Semester Ganjil</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Semester Genap</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active pt-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        @include('nilai.raport_detail', [
                                            'anggota_kelas' => $nilai['anggota_kelas'],
                                            'semester' => 'ganjil',
                                            'prestasi' => $nilai['prestasi_ganjil'],
                                            'ekskul' => $nilai['ekskul'],
                                            'mapel_of_jadwal' => $nilai['mapel_of_jadwal'],
                                        ])
                                    </div>
                                    <div class="tab-pane fade pt-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        @include('nilai.raport_detail', [
                                            'anggota_kelas' => $nilai['anggota_kelas'],
                                            'semester' => 'genap',
                                            'prestasi' => $nilai['prestasi_genap'],
                                            'ekskul' => $nilai['ekskul'],
                                            'mapel_of_jadwal' => $nilai['mapel_of_jadwal'],
                                        ])
                                    </div>
                                </div>
                            @else
                                <p class="text-center mb-0">Siswa Belum Memiliki Data Nilai</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
