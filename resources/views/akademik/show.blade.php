@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class=" mb-0 ">Data Kelas {{ $id_kelas }} Tahun Ajaran
                            {{ $tahun_ajar->tahun_mulai }} - {{ $tahun_ajar->tahun_selesai }}</h2>
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
                                    <a href="#absensi" class="nav-link" data-toggle="tab">Absensi</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#wali" class="nav-link" data-toggle="tab">Wali Kelas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#nilai" class="nav-link" data-toggle="tab">Nilai</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="siswa">
                                    <div class="card-body px-0">
                                        <div class="card-header d-flex justify-content-end px-0 pt-0">
                                            <a href="#" data-bs-toggle="modal" onclick="createAnggota(this)" data-bs-target="#studentModal"
                                                class="btn btn-primary add" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Tambah Anggota Kelas"> <i
                                                    class="fas fa-folder-plus"></i> Anggota Kelas Baru</a>
                                        </div>
                                        @include('anggota_kelas.datatable')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="jadwal">
                                    <div class="card-body px-0">
                                        <div class="card-header d-flex justify-content-end px-0 pt-0">
                                            <a href="#" onclick="createJadwal(this)" data-bs-toggle="modal"
                                                data-bs-target="#jadwalModal" class="btn btn-primary add"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Jadwal">
                                                <i class="fas fa-folder-plus"></i> Jadwal Baru</a>
                                        </div>
                                        @include('jadwal.datatable')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="absensi">
                                    <div class="card-body px-0">
                                        <div class="card-header d-flex justify-content-end px-0 pt-0">
                                            <button onclick="showAbsensiForm(this)" class="btn btn-primary add"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Management Absensi">
                                                <i class="fas fa-folder-plus"></i> Management Absensi</button>
                                        </div>

                                        <div id="absensiContainer">
                                            @if ($count_anggota > 0)
                                                    @include('absensi.table')
                                            @else
                                                <i>Kelas ini belum memiliki anggota</i>
                                            @endif
                                        </div>
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
                                <div class="tab-pane fade" id="nilai">
                                    <div class="card-body px-0">
                                        @if ($count_anggota > 0)
                                            {{-- @include('anggota_kelas.datatable') --}}
                                            @include('anggota_kelas.datatable', ['custom_action' => 'anggota_kelas.datatable_nilai_action', 'custom_id' => 'asdanjing'])
                                        @else
                                            <i>Kelas ini belum memiliki anggota</i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="history.back()" class="btn btn-danger">Kembali</a>
                    </div>
                </div>

                @include('absensi.crud')
                @include('nilai.mapel_list')
                <div id="raportContainer" class="d-none"></div>
                {{-- @include('nilai.edit_raport') --}}

                <div class="row bottom-hint" data-href="#siswa">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <span class="text-danger"> <b> <i>Catatan :</i> </b> </span> <br>
                                <ul class="mb-0">
                                    <li>Siswa yang sudah ada di kelas dan tahun ajar ini tidak dapat ditambahkan lagi</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-none bottom-hint" data-href="#jadwal">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <span class="text-danger"> <b> <i>Catatan :</i> </b> </span> <br>
                                <ul class="mb-0">
                                    <li>Tiap jadwal yang dibuat baru atau diubah akan mempengaruhi mata pelajaran pada data
                                        nilai.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-none bottom-hint" data-href="#absensi">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <span class="text-danger"> <b> <i>Catatan :</i> </b> </span> <br>
                                <ul class="mb-0">
                                    <li>Huruf A berarti siswa tanpa keterangan</li>
                                    <li>Huruf S berarti siswa sakit</li>
                                    <li>Huruf I berarti siswa ijin</li>
                                    <li>Huruf H berarti siswa hadir</li>
                                    <li>Hover dibagian angka absensi ke- untuk melihat tanggal absensi</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-none bottom-hint" data-href="#nilai">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <span class="text-danger"> <b> <i>Catatan :</i> </b> </span> <br>
                                <ul class="mb-0">
                                    <li>Tekan tombol Smt Ganjil pada tabel siswa untuk melihat nilai semester ganjil dari siswa</li>
                                    <li>Tekan tombol Smt Genap pada tabel siswa untuk melihat nilai semester genap dari siswa</li>
                                    <li>Silahkan tambahkan mata pelajaran yang akan dinilai</li>
                                    <li>Apabila mata pelajaran dihapus dari daftar penilaian, maka semua nilai terkait mata pelajaran dan anggota kelas akan dihapus dari db</li>
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
    @include('akademik.modal.mapel_list')
@endsection

@push('scripts')
    <script>
        $('.nav-tabs a').click(function() {
            hideBottomHint()
            const rawHrefValue = $(this).attr('href')
            
            if (rawHrefValue != '#absensi') {
                const absensiFormCon = document.getElementById('absensiFormContainer')
                absensiFormCon.classList.add('d-none')
            }

            const mapelListCon = document.getElementById('mapelListContainer')
            if (rawHrefValue != '#nilai') {
                mapelListCon.classList.add('d-none')
            }else{
                mapelListCon.classList.remove('d-none')
            }

            // const formRaportContainer = document.getElementById('formRaportContainer')
            // if (rawHrefValue != '#nilai') {
            //     formRaportContainer.classList.add('d-none')
            // }else{
            //     formRaportContainer.classList.remove('d-none')
            // }

            const hintElement = $(`[data-href="${rawHrefValue}"]`)
            if (hintElement != undefined) {
                hintElement.removeClass('d-none')
            }
        })

        function hideBottomHint() {
            const listHint = document.getElementsByClassName('bottom-hint')
            for (let index = 0; index < listHint.length; index++) {
                const bottomHint = listHint[index];
                bottomHint.classList.add('d-none')
            }
        }
    </script>
    @include('nilai.js')
@endpush
