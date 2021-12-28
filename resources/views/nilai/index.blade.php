@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Nilai</h1>

        @if (roleName() == 'ortu')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['method' => 'get']) !!}
                            <div class="row align-items-end">
                                <div class="col-12 col-md-6 pb-3 pb-md-0">
                                    {!! Form::label('user', 'Nama Siswa', ['class' => 'mb-1']) !!}
                                    {!! Form::select('id_anggota_kelas', $anggota_kelas, $id_anggota_kelas, ['class' => 'form-control', 'id' => 'filterSiswa']) !!}
                                </div>
                                <div class="col-12 col-md-6 pb-3 pb-md-0">
                                    <button type="submit" class="btn btn-primary">Pilih</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <div class=" d-flex justify-content-between">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class=" mb-0 ">Data Nilai Akademik</h4>
                        </div>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <table>
                                <tr>
                                    <td style="width: 100px">Nama Siswa</td>
                                    <td>:</td>
                                    <td>....</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td>....</td>
                                </tr>
                                <tr>
                                    <td>Wali Kelas</td>
                                    <td>:</td>
                                    <td>....</td>
                                </tr>
                                <tr>
                                    <td>Tahun Ajaran</td>
                                    <td>:</td>
                                    <td>....</td>
                                </tr>
                            </table>
                        </div>
                        <div class="px-3">
                        </div>
                        <div class="card-body">
                            <div class=" d-flex justify-content-between">
                                {{-- @include('nilai.datatable') --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Nilai Tugas</th>
                                        <th>Nilai UTS</th>
                                        <th>Nilai UAS</th>
                                        <th>Nilai Rata-Rata</th>
                                    </thead>
                                    <tbody>
                                        <th>1</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class=" mb-0 ">Data Nilai Ektrakulikuler</h4>
                        </div>
                        <div class="px-3">
                        </div>
                        <div class="card-body">
                            <div class=" d-flex justify-content-between">
                                {{-- @include('nilai.datatable') --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Ektrakulikuler</th>
                                        <th>Keterangan</th>
                                    </thead>
                                    <tbody>
                                        <th>1</th>
                                        <th>...</th>
                                        <th>...</th>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <hr>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class=" mb-0 ">Data Nilai Sikap</h4>
                        </div>
                        <div class="px-3">
                        </div>
                        <div class="card-body">
                            <div class=" d-flex justify-content-between">
                                {{-- @include('nilai.datatable') --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Jenis Sikap</th>
                                        <th>Keterangan</th>
                                    </thead>
                                    <tbody>
                                        <th>1</th>
                                        <th>...</th>
                                        <th>...</th>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <hr>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class=" mb-0 ">Data Nilai Kesehatan</h4>
                        </div>
                        <div class="px-3">
                        </div>
                        <div class="card-body">
                            <div class=" d-flex justify-content-between">
                                {{-- @include('nilai.datatable') --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Jenis Kesehatan</th>
                                        <th>Keterangan</th>
                                    </thead>
                                    <tbody>
                                        <th>1</th>
                                        <th>...</th>
                                        <th>...</th>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <hr>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class=" mb-0 ">Data Nilai Proporsi</h4>
                        </div>
                        <div class="px-3">
                        </div>
                        <div class="card-body">
                            <div class=" d-flex justify-content-between">
                                {{-- @include('nilai.datatable') --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Jenis Proporsi</th>
                                        <th>Keterangan</th>
                                    </thead>
                                    <tbody>
                                        <th>1</th>
                                        <th>...</th>
                                        <th>...</th>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (roleName() == 'guru')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class=" mb-0 ">Data Nilai Siswa</h4>
                        </div>
                        <div class="px-3">
                        </div>
                        <div class="card-body">
                            <div class=" d-flex justify-content-between">
                                @include('nilai.datatable')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
