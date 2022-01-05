@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class=" mb-0 ">Data Anggota Siswa Kelas {{ $id_kelas }}</h2>
                    </div>
                    <div class="px-3">
                        @include('layouts.flash')
                        @include('layouts.error_message')
                    </div>
                    <div class="card-body">
                        <div class="bs-example">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#siswa" class="nav-link active" data-toggle="tab">Data Siswa</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#jadwal" class="nav-link" data-toggle="tab">Jadwal Pelajaran</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#wali" class="nav-link" data-toggle="tab">Wali Kelas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#absensi" class="nav-link" data-toggle="tab">Absensi</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="siswa">
                                    <div class="card-body px-0">
                                        <div class="card-header d-flex justify-content-end px-0">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#studentModal"
                                                class="btn btn-primary add" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Tambah Anggota Kelas"> <i
                                                    class="fas fa-folder-plus"></i> Anggota Kelas Baru</a>
                                        </div>
                                        @include('anggota_kelas.datatable')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="jadwal">
                                    <div class="card-body px-0">
                                        <div class="card-header d-flex justify-content-end px-0">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#jadwalModal"
                                                class="btn btn-primary add" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Tambah Jadwal"> <i
                                                    class="fas fa-folder-plus"></i> Jadwal Baru</a>
                                        </div>
                                        @include('jadwal.datatable')
                                        {{-- @forelse ($jadwal_kelas as $hari => $jadwal)
                                            @include('jadwal.card', ['jadwal' => $jadwal])
                                        @empty
                                            <p class="text-center">Jadwal kosong</p>
                                        @endforelse --}}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="wali">
                                    <div class="card-body px-0">
                                        @if (isset($wali_kelas))
                                            @include('wali_kelas.form-show')
                                        @else
                                            <i>{{ '"Kelas ini belum memiliki wali kelas"' }} </i>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="absensi">
                                    <div class="card-body px-0">
                                        @if (isset($wali_kelas))
                                            @include('wali_kelas.form-show')
                                        @else
                                            <i>{{ '"Kelas ini belum memiliki wali kelas"' }} </i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="history.back()" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Anggota Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'anggota_kelas.store', 'id' => 'formAddStudent']) !!}
                    <div class="row">
                        {!! Form::hidden('id_kelas', $id_kelas, []) !!}
                        {!! Form::hidden('id_tahun_ajar', $id_tahun_ajar, []) !!}
                        <div class="col-12 pb-3 pb-md-0 mb-2">
                            {!! Form::label('idSiswa', 'Nama Siswa', ['class' => 'mb-1']) !!}
                            {!! Form::select('id_siswa', $siswa, null, ['class' => 'form-control select2Student', 'id' => 'idSiswa']) !!}
                            <div class="invalid-feedback" error-name="id_siswa">
                            </div>
                        </div>
                        <small> <i>Silahkan pilih siswa yang ingin ditambahkan di kelas</i> </small>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="btnStoreStudent">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="jadwalModal" tabindex="-1" aria-labelledby="jadwalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jadwalModalLabel">Anggota Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'jadwal.store', 'id' => 'formAddJadwal']) !!}
                    <div class="row">
                        {!! Form::hidden('id_kelas', $id_kelas, []) !!}
                        {!! Form::hidden('id_tahun_ajar', $id_tahun_ajar, []) !!}

                        <div class="col-12 pb-3 pb-md-0 mb-2">
                            {!! Form::label('idMapel', 'Nama Mapel', ['class' => 'mb-1']) !!}
                            {!! Form::select('id_mapel', $mapel, null, ['class' => 'form-control select2Jadwal', 'id' => 'idMapel']) !!}
                            <div class="invalid-feedback" error-name="id_mapel">
                            </div>
                        </div>

                        <div class="col-12 pb-3 pb-md-0 mb-2">
                            {!! Form::label('idGuru', 'Nama Guru', ['class' => 'mb-1']) !!}
                            {!! Form::select('id_guru', $guru, null, ['class' => 'form-control select2Jadwal', 'id' => 'idGuru']) !!}
                            <div class="invalid-feedback" error-name="id_guru">
                            </div>
                        </div>

                        <div class="col-12 pb-3 pb-md-0 mb-2">
                            {!! Form::label('hari', 'Hari', ['class' => 'mb-1']) !!}
                            {!! Form::select('hari', ['Senin' =>'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis',  'Jumat' => 'Jumat', 'Sabtu' => 'Sabtu', 'Minggu' => 'Minggu'], null, ['class' => 'form-control select2Jadwal', 'id' => 'hari']) !!}
                            <div class="invalid-feedback" error-name="hari">
                            </div>
                        </div>

                        <div class="col-12 pb-3 pb-md-0 mb-2">
                            {!! Form::label('jamMulai', 'Jam Mulai', ['class' => 'mb-1']) !!}
                            {!! Form::time('jam_mulai', null, ['class' => 'form-control', 'id' => 'jamMulai']) !!}
                            <div class="invalid-feedback" error-name="jam_mulai">
                            </div>
                        </div>

                        <div class="col-12 pb-3 pb-md-0 mb-2">
                            {!! Form::label('jamSelesai', 'Jam Selesai', ['class' => 'mb-1']) !!}
                            {!! Form::time('jam_selesai', null, ['class' => 'form-control', 'id' => 'jamSelesai']) !!}
                            <div class="invalid-feedback" error-name="jam_selesai">
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="btnStoreJadwal">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
