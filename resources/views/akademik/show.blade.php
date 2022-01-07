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
                                            <a href="#" onclick="createJadwal(this)" data-bs-toggle="modal"
                                                data-bs-target="#jadwalModal" class="btn btn-primary add"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Jadwal">
                                                <i class="fas fa-folder-plus"></i> Jadwal Baru</a>
                                        </div>
                                        @include('jadwal.datatable')
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

                <div class="row d-none" data-id="jadwal">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <span class="text-danger"> <b> <i>Catatan :</i> </b> </span> <br>
                                <ul class="mb-0">
                                    <li>Tiap jadwal yang dibuat baru atau diubah akan mempengaruhi mata pelajaran pada data nilai.</li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('akademik.modal.anggota')
    @include('akademik.modal.jadwal')
@endsection

@push('scripts')
    <script>
        $('.nav-tabs a').click(function(){
            const rawHrefValue = $(this).attr('href')
            const hrefValue = rawHrefValue.replace('#', '')
            const hintElement = $(`[data-id="${hrefValue}"]`)
            if(hintElement != undefined){
                hintElement.removeClass('d-none')
            }
        })
    </script>
@endpush
