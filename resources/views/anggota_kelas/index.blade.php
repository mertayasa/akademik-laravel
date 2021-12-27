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
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="siswa">
                                    <div class="card-body px-0">
                                        <div class="card-header d-flex justify-content-end px-0">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#studentModal"
                                                class="btn btn-primary add" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Tambah anggota_kelas"> <i
                                                    class="fas fa-folder-plus"></i> Anggota Kelas Baru</a>
                                        </div>
                                        @include('anggota_kelas.datatable')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="jadwal">
                                    <div class="card-body px-0">
                                        @include('jadwal.datatable')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="wali">
                                    <div class="card-body px-0">
                                        @if (isset($wali_kelas))
                                            @include('wali_kelas.form-show')
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
                            {!! Form::select('id_siswa', $siswa, null, ['class' => 'form-control', 'id' => 'idSiswa']) !!}
                            <div class="invalid-feedback">
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

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('select').select2({
                    dropdownParent: $("#studentModal") 
                });
            })

            const btnStoreStudent = document.getElementById('btnStoreStudent')
            
            btnStoreStudent.addEventListener('click', event => {
                const formAdd = document.getElementById('formAddStudent')
                const actionUrl = formAdd.getAttribute('action')
                
                fetch(actionUrl, {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    method: 'POST',
                    body: new FormData(formAdd)
                })
                .then(response => {
                    const data = response.json()
                    if(response.status == 400){
                        data.then((res) => {
                            const error = res.errors
                            Object.keys(error).forEach(function(key) {
                                let errorSpan = document.querySelectorAll(`[name="${key}"]`)
                                errorSpan[0].classList.add('is-invalid')
                                errorSpan[0].querySelectorAll('.invalid-feedback')
                                // errorSpan[0].nextElementSibling.innerHTML = error[key][0]
                            });
                        });
                    }
                })
                .then(data => {
                    console.log(data);
                })
                .catch((error) => {
                    showToast(0, 'Gagal menambahkan data anggota kelas')
                })
            })

        </script>
    @endpush
@endsection
