<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="{{ asset('admin/css/print.css') }}" rel="stylesheet">

    <title>Raport</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif">

    {{-- SAMPUL --}}
    <div class="sampul">
        <center>
            <img class="img-fluid mt-5" src="{{ asset('admin/img/logo.sd.png') }}" alt="Responsive image" width="170"
                height="170">
        </center>

        <div class="sampul-judul mt-3 mb-3">
            <p>RAPOR <br> PESERTA DIDIK <br> SEKOLAH DASAR <br> (SD) </p>
        </div>

        <center>
            <img class="img-fluid" src="{{ asset('admin/img/logo-kab.jpg') }}" alt="Responsive image" width="170"
                height="170">
        </center>

        <div class="identitas justify-content-center">
            <p><b>Nama Peserta Didik </b></p>
            <div class="nama-siswa justify-item-center"><b>{{ $anggota_kelas->siswa->nama }}</b></div>
        </div>

        <div class="identitas justify-content-center">
            <p><b>NISN/NIS </b></p>
            <div class="nama-siswa justify-item-center"><b>{{ $anggota_kelas->siswa->nis }}</b></div>
        </div>

        <div class="sampul-judul-bawah">
            <p>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN <br> REPUBLIK INDONESIA</p>
        </div>
    </div>

    {{-- PETUNJUK PENGISIAN --}}
    <div class="hal-2">
        <p class="title">PETUNJUK PENGISIAN RAPOR</p>
        <p>
        <ol>
            <li>Rapor Peserta Didik dipergunakan selama peserta didik yang bersangkutan mengikuti seluruh program
                pembelajaran di Sekolah Dasar tersebut;
            </li>
            <li>Identitas sekolah diisi dengan data yang sesuai dengan keberadaan Sekolah Dasar
            </li>
            <li>Daftar Peserta Didik diisi oleh daftar peserta didik yang ada salam Rapor Peserta Didik ini;</li>
            <li>Identitas Peserta didik diisi oleh data yang sesuai dengan keberadaan peserta didik;</li>
            <li>Rapor Peserta Didik harus dilengkapi dengan pas foto berwama (3 x 4) dan pengisiannya dilakukan oleh
                Guru Kelas; </li>
            <li>Kompetensi inti 1 (KI-1) untuk sikap spiritual diambil dari KI-1 pada muatan pelajaran pendidikan agama
                dan budi pekerti dan PPKn;</li>
            <li>Kompetensi inti 2 (KI-2) untuk sikap sosial diambil dari KI-2 pada muatan pelajaran Pendidikan Agama dan
                Budi Pekerti dan PPKn; </li>
            <li>Kompetensi inti 3 dan 4 (KI-3 dan KI-4) diambil dari KI-3 dan KI-4 pada semua muatan pelajaran;</li>
            <li>Hasil penilaian pengetahuan dan keterampilan dilaporkan dalam bentuk nilai, predikat dan deskripsi
                pencapaian kompetensi mata pelajaran;</li>
            <li>Hasil penilaian sikap dilaporkan dalam bentuk predikat dan/atau deskripsi;</li>
            <li>Predikat yang ditulis dalam Rapor Peserta Didik:<br>
                A : Sangat Baik <br>
                B : Balk <br>
                C : Cukup <br>
                D : Perlu Bimbingan
            </li>
            <li>Deskripsi pengetahuan dan keterampilan ditulis dengan kalimat positif sesuai dengan capaian KD tertinggi
                atau terendah dari masing-masing muatan pelajaran yang diperoleh peserta didik. Deskripsi berisi
                pengetahuan dan keterampilan yang sangat baik/dan atau baik yang dikuasai dan penguasaannya belum
                optimal. Apabila nilai capaian KD muatan pelajaran yang diperoleh dari suatu muatan pelajaran sama,
                kolom deskripsi ditulis sesuai dengan capaian untuk semua KD; </li>
            <li>Laporan Ekstrakurikuler diisi dengan kegiatan ekstrakurikuler yang diikuti oleh peserta didik;</li>
            <li>Saran-saran diisi tentang hal-hal yang perlu mendapatkan perhatian peserta didik, pendidik, dan
                orangtua/wali terutama untuk hal-hal yang tidak didapatkan dari sekolah;</li>
            <li>Laporan tinggi dan berat badan peserta didik ditulis berdasarkan hasil pengukuran yang dilakukan
                pendidik; </li>
            <li>Laporan kondisi kesehatan fisik diisi dengan deskripsi hasil pemeriksaan yang dilakukan pendidik,
                bekerjasama dengan tenaga kesehatan atau puskesmas terdekat;</li>
            <li>Prestasi diisi dengan prestasi peserta didik yang menonjol;</li>
            <li>Kolom ketidakhadiran ditulis dengan data akumulasi ketidakhadiran peserta didik karena sakit, izin, atau
                tanpa keterangan selama satu semester;</li>
            <li>Apabila peserta didik pindah, maka dicatat di dalam kolom keterangan pindah. </li>
            <li>Kolom pernyataan kenaikan kelas diisi keterangan naik atau tinggal kelas.</li>
        </ol>
        </p>
    </div>
    {{-- <br><br><br><br><br><br><br><br><br><br><br><br><br> --}}

    {{-- IDENTITAS SISWA --}}
    <div class="hal-3 ">
        <p class="title">KETERANGAN DIRI PESERTA DIDIK</p>
        <table>
            <tr>
                <td style="width: 200px">Nama Peserta Didik</td>
                <td> : </td>
                <td>{{ $anggota_kelas->siswa->nama }}</td>
            </tr>
            <tr>
                <td>NISN / NIS</td>
                <td> : </td>
                <td>{{ $anggota_kelas->siswa->nis }}</td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td> : </td>
                <td> {{ $anggota_kelas->siswa->tempat_lahir }}, {{ $anggota_kelas->siswa->tgl_lahir }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td> : </td>
                <td>{{ $anggota_kelas->siswa->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td> : </td>
                <td>{{ $anggota_kelas->siswa->agama}}</td>
            </tr>
            <tr>
                <td>Pendidikan Sebelumnya</td>
                <td> : </td>
                <td>Taman Kanak-Kanak (TK)</td>
            </tr>
            <tr>
                <td>Alamat Peserta Didik</td>
                <td> : </td>
                <td>{{ $anggota_kelas->siswa->alamat }}</td>
            </tr>
            <tr>
                <td>Nama Orang Tua</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Ayah</td>
                <td> : </td>
                <td>{{ $anggota_kelas->siswa->user->nama ?? '-' }}</td>
            </tr>
            <tr>
                <td>Ibu</td>
                <td> : </td>
                <td>{{ $anggota_kelas->siswa->user->nama_ibu ?? '-' }}</td>
            </tr>
            <tr>
                <td>Pekerjaan Orang Tua</td>
                <td> </td>
                <td></td>
            </tr>
            <tr>
                <td>Ayah</td>
                <td> : </td>
                <td>{{ $anggota_kelas->siswa->user->pekerjaan ?? '-' }}</td>
            </tr>
            <tr>
                <td>Ibu</td>
                <td> : </td>
                <td>{{ $anggota_kelas->siswa->user->pekerjaan_ibu ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alamat Orang Tua</td>
                <td> </td>
                <td>{{ $anggota_kelas->siswa->user->alamat ?? '-' }}</td>
            </tr>
            <tr>
                <td>Jalan</td>
                <td> : </td>
                <td>{{ $anggota_kelas->siswa->alamat ?? '-' }}</td>
            </tr>
            <tr>
                <td>Kelurahan/Desa</td>
                <td> : </td>
                <td>Baha</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td> : </td>
                <td>Mengwi</td>
            </tr>
            <tr>
                <td>Kabupaten/Kota</td>
                <td> : </td>
                <td>Badung</td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td> : </td>
                <td>{{ province() }}</td>
            </tr>
            <tr>
                <td>Wali Peserta Didik</td>
                <td> </td>
                <td></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td> : </td>
                <td> {{ $anggota_kelas->siswa->user->nama ?? '-' }} </td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td> : </td>
                <td> {{ $anggota_kelas->siswa->user->pekerjaan ?? '-' }} </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> : </td>
                <td> {{ $anggota_kelas->siswa->user->alamat ?? '-' }} </td>
            </tr>
        </table>
        <table style="border:none; margin-bottom:300px" class="mt-3">
            <tr style="border:none;">
                <td style="border:none;">
                    <div class="foto mr-5"></div>
                </td>
                <td style="border:none;" class="ttd">
                    <div class="ttd ml-5">
                        Badung, .... <br>
                        Kepala Sekolah,<br>

                        <br><br><br>
                        <div class="nip text-left">
                            <p><u><b>I Made Renata, S.Pd </b></u> <br>NIP. 196802071993071001</p>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    {{-- IDENTITAS SEKOLAH --}}
    <div class="hal-4 ">
        <p class="title ">RAPOR <br> PESERTA DIDIK <br> SEKOLAH DASAR <br> (SD) </p>
        <table class="identitas-sekolah">
            <tr>
                <td style="width: 200px">Nama Sekolah</td>
                <td> : </td>
                <td> SD NO. 2 BAHA</td>
            </tr>
            <tr>
                <td>NPSN</td>
                <td> : </td>
                <td>50101742</td>
            </tr>
            <tr>
                <td>NIS/NSS/NDS</td>
                <td> : </td>
                <td>101220403009</td>
            </tr>
            <tr>
                <td>Alamat Sekolah</td>
                <td> : </td>
                <td>Br. Pengabatan</td>
            </tr>
            <tr>
                <td></td>
                <td> </td>
                <td>Kode Pos : 80351, Telp. 03618940188</td>
            </tr>
            <tr>
                <td>Kelurahan/Desa</td>
                <td> : </td>
                <td>Baha</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td> : </td>
                <td>Mengwi</td>
            </tr>
            <tr>
                <td>Kota/Kabupaten</td>
                <td> : </td>
                <td>Badung</td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td> : </td>
                <td>Bali</td>
            </tr>
            <tr>
                <td>Website</td>
                <td> : </td>
                <td>http://</td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td> : </td>
                <td>sd2baha@gmail.com</td>
            </tr>

        </table>
    </div>

    {{-- NILAI --}}
    <br>
    <div class="nilai">
        <p class="title">RAPOR PESERTA DIDIK DAN PROFLE PESERTA DIDIK</p>
        <table class="bio">
            <tr>
                <td>Nama Peserta Didik </td>
                <td> :</td>
                <td>{{ $anggota_kelas->siswa->nama }}</td>
                <td style="width:20px;"></td>
                <td>Kelas</td>
                <td>:</td>
                <td>{{ $anggota_kelas->kelas->kode }}</td>
            </tr>
            <tr>
                <td>Nomor Induk/NISN </td>
                <td> :</td>
                <td>{{ $anggota_kelas->siswa->nis }}</td>
                <td style="width:20px;"></td>
                <td>Semester</td>
                <td> : </td>
                <td>{{ getSemesterName($semester) }}</td>
            </tr>
            <tr>
                <td>Nama Sekolah </td>
                <td> :</td>
                <td>SD N 2 BAHA</td>
                <td style="width:20px;"></td>
                <td>Tahun Pelajaran</td>
                <td> : </td>
                <td>{{ $anggota_kelas->tahun_ajar->keterangan }}</td>
            </tr>
            <tr>
                <td>Alamat </td>
                <td> : </td>
                <td>{{ $anggota_kelas->siswa->alamat }}</td>
            </tr>
        </table>
        <hr>

        <p class="sub-title">A. SIKAP</p>
        <table class="table table-bordered">
            <tr>
                <td colspan="2" style="text-align: center;"> <b>Deskripsi </b></td>
            </tr>
            <tr>
                <td style="width:200px; height:60px;"><b>1. Sikap Spiritual </b></td>
                <td>{{ $anggota_kelas->getNilaiSikapValue('spiritual', $semester) }}</td>
            </tr>
            <tr>
                <td style="width:200px; height:60px;"><b>2. Sikap Sosial </b></td>
                <td>{{ $anggota_kelas->getNilaiSikapValue('sosial', $semester) }}</td>
            </tr>
        </table>

        <p class="sub-title">B. PENGETAHUAN DAN KETERAMPILAN</p>
        <p style="margin-top:-15px;"><b>Kriteria Ketuntasan Minimal Satuan Pendidikan = 65 </b></p>
        <table class="table table-bordered  ">
            {{-- <thead class="text-center table-nilai" style="font-weight: 200"> --}}
            <tr style="text-align:center;">
                <td rowspan=" 2" style="align-item: middle;"><b> No </b></td>
                <td rowspan="2"><b> Mata Pelajaran </b></td>
                <td colspan="3"><b> Pengetahuan </b></td>
                <td colspan="3"><b> Keterampilan </b></td>
            </tr>
            <tr style="text-align:center;">
                <td><b> Angka </b></td>
                <td><b> Predikat </b></td>
                <td><b> Deskripsi </b></td>
                <td><b> Angka </b></td>
                <td><b> Predikat </b></td>
                <td><b> Deskripsi </b></td>
            </tr>
            {{-- </thead> --}}
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($mapel_of_jadwal as $mapel)
                    @if ($mapel->is_lokal == false)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td> {{ $mapel->nama }}</td>
                            <td>{{ $anggota_kelas->rataNilaiPengetahuan($semester, $mapel->id) }}</td>
                            <td> {{ getPredikatNilai($anggota_kelas->rataNilaiPengetahuan($semester, $mapel->id)) }}
                            </td>
                            <td>{{ $anggota_kelas->getNilaiValue('desk_pengetahuan', $mapel->id, $semester) }}</td>
                            <td>{{ $anggota_kelas->rataNilaiKeterampilan($semester, $mapel->id) }}</td>
                            <td> {{ getPredikatNilai($anggota_kelas->rataNilaiKeterampilan($semester, $mapel->id)) }}
                            </td>
                            <td>{{ $anggota_kelas->getNilaiValue('desk_keterampilan', $mapel->id, $semester) }}</td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="8"><b> Muatan Lokal </b></td>
                </tr>
                @php
                    $no = 1;
                @endphp
                @foreach ($mapel_of_jadwal as $mapel)
                    @if ($mapel->is_lokal == true)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td> {{ $mapel->nama }}</td>
                            <td>{{ $anggota_kelas->rataNilaiPengetahuan($semester, $mapel->id) }}</td>
                            <td> {{ getPredikatNilai($anggota_kelas->rataNilaiPengetahuan($semester, $mapel->id)) }}
                            </td>
                            <td>{{ $anggota_kelas->getNilaiValue('desk_pengetahuan', $mapel->id, $semester) }}</td>
                            <td>{{ $anggota_kelas->rataNilaiKeterampilan($semester, $mapel->id) }}</td>
                            <td> {{ getPredikatNilai($anggota_kelas->rataNilaiKeterampilan($semester, $mapel->id)) }}
                            </td>
                            <td>{{ $anggota_kelas->getNilaiValue('desk_keterampilan', $mapel->id, $semester) }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <p class="sub-title">C. EKSTRAKURIKULER</p>
        <table class="table table-bordered">
            <tr>
                <td style="width: 20px"><b> No </b></td>
                <td><b> Kegiatan Ekstrakulkuler </b></td>
                <td><b> Keterangan </b></td>
            </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($ekskul as $eks)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $eks->nama }}</td>
                    <td>{{ $anggota_kelas->getNilaiEkskulValue($eks->id, $semester) }}</td>
                </tr>
            @endforeach
        </table>

        <p class="sub-title">D. SARAN-SARAN</p>
        <table class="table table-bordered">
            <tr>
                <td style="height: 100px"><b> {{ $anggota_kelas->getSaranValue($semester) }} </b></td>
            </tr>
        </table>

        <p class="sub-title">E. TINGGI DAN BERAT BADAN</p>
        <table class="table table-bordered">
            <tr style="text-align: center;">
                <td style="width: 20px" rowspan="2"><b> No </b></td>
                <td rowspan="2"><b> Aspek Yang Dinilai </b></td>
                <td colspan="2"><b> Semester </b></td>
            </tr>

            <tr style="text-align: center;">
                <td><b> 1 (Satu)</b></td>
                <td><b> 2 (Dua)</b></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Tinggi Badan</td>
                <td> {{ $anggota_kelas->getNilaiProporsiValue('tinggi', $semester) }} </td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Berat Badan</td>
                <td> {{ $anggota_kelas->getNilaiProporsiValue('berat', $semester) }} </td>
                <td></td>
            </tr>
        </table>

        <br>
        <p class="sub-title">F. KONDISI KESEHATAN</p>
        <table class="table table-bordered">
            <tr style="text-align: center;">
                <td style="width: 20px"><b> No </b></td>
                <td><b> Aspek Yang Dinilai </b></td>
                <td><b> Keterangan </b></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Pendengaran</td>
                <td> {{ $anggota_kelas->getNilaiKesehatanValue('pendengaran', $semester) }} </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Penglihatan</td>
                <td> {{ $anggota_kelas->getNilaiKesehatanValue('penglihatan', $semester) }} </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Gigi</td>
                <td> {{ $anggota_kelas->getNilaiKesehatanValue('gigi', $semester) }} </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Lainnya</td>
                <td> {{ $anggota_kelas->getNilaiKesehatanValue('lain', $semester) }} </td>
            </tr>
        </table>

        <p class="sub-title">G. JENIS PRESTASI</p>
        <table class="table table-bordered">
            <tr style="text-align: center;">
                <td style="width: 20px"><b> No </b></td>
                <td><b> Jenis Prestasi </b></td>
                <td><b> Keterangan </b></td>
            </tr>
            @forelse ($prestasi as $prest)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $prest->jenis }}</td>
                    <td>{{ $prest->keterangan }}</td>
                </tr>
            @empty
                <tr>
                    <td>1</td>
                    <td></td>
                    <td> </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td></td>
                    <td> </td>
                </tr>
            @endforelse
        </table>

        <p class="sub-title">H. KETIDAKHADIRAN</p>
        <table class="table table-bordered">
            <tr>
                <td>Sakit : </td>
            </tr>
            <tr>
                <td>Ijin : </td>
            </tr>
            <tr>
                <td>Tanpa Keterangan : </td>
            </tr>
        </table>

        <div class="ttd ml-5">
            <table style="border:none;">
                <tr style=" border:none;">
                    <td style="border:none;">
                        <div>
                            Mengetahui <br>
                            Orang Tua/Wali ,<br>

                            <br><br><br>
                            <div class="nip text-left">
                                <p>...................</p>
                            </div>
                        </div>
                    </td>
                    <td style="border:none;">
                        <div style="width: 250px;">

                        </div>
                    </td>
                    {{-- <td style="border:none;">
                        <div style="width: 100px;">

                        </div>
                    </td> --}}
                    <td style="border:none;">
                        <div class="ttd ">
                            Badung, .................. <br>
                            Wali Kelas,<br>

                            <br><br><br>
                            <div class="nip text-left">
                                <p><u><b>aaaaa </b></u>
                                    <br>NIP.
                                </p>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr style=" border:none;">
                    <td style="border:none;">
                        <div style="width: 200px;">

                        </div>
                    </td>
                    <td style="border:none;">
                        <div class="ttd ">
                            Badung, .................. <br>
                            Kepala Sekolah,<br>

                            <br><br><br>
                            <div class="nip text-left">
                                <p><u><b>aaaaa </b></u>
                                    <br>NIP.
                                </p>
                            </div>
                        </div>
                    </td>
                    <td style="border:none;">
                        <div style="width: 200px;">

                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <br><br><br>

    {{-- PINDAH SEKOLAH MASUK --}}
    <div class="hal-8 ">
        <div class="pindah-masuk">
            <p class="title ">KETERANGAN PINDAH SEKOLAH </p>

            <p>Nama Peserta Didik : ..............</p>
            <table class="table pindah table-bordered">
                <tr style="text-align: center;">
                    <th style="width:20px; text-align: center;">No</th>
                    <th style="text-align: center;" colspan="3">MASUK</th>
                </tr>
                <tr>
                    <td>
                        <li style="list-style: none;">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <br><br>
                        <li>5</li>
                    </td>
                    <td>
                        <li style="list-style: none;">Nama Siswa</li>
                        <li>Nomor Induk</li>
                        <li>Nama Sekolah</li>
                        <li>Masuk di Sekolah Ini <br> a. Tinggal <br> b. Di Kelas</li>
                        <li>Tahun Pelajaran</li>

                    </td>
                    <td>
                        <li>
                            ..............
                        </li>
                        <li>
                            ..............
                        </li>
                        <li>
                            ..............
                        </li>
                        <br> <br>
                        <li>
                            ..............
                        </li>
                        <li>
                            ..............
                        </li>
                    </td>
                    <td>
                        <li>
                            ..............
                        </li>
                        <li>
                            Kepala Sekolah,
                        </li>
                        <br><br><br>
                        <li>
                            <u>..............</u>
                        </li>
                        <li>
                            NIP.
                        </li>

                    </td>
                </tr>
                <tr>
                    <td>
                        <li style="list-style: none;">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <br><br>
                        <li>5</li>
                    </td>
                    <td>
                        <li style="list-style: none;">Nama Siswa</li>
                        <li>Nomor Induk</li>
                        <li>Nama Sekolah</li>
                        <li>Masuk di Sekolah Ini <br> a. Tinggal <br> b. Di Kelas</li>
                        <li>Tahun Pelajaran</li>

                    </td>
                    <td>
                        <li>
                            ..............
                        </li>
                        <li>
                            ..............
                        </li>
                        <li>
                            ..............
                        </li>
                        <br> <br>
                        <li>
                            ..............
                        </li>
                        <li>
                            ..............
                        </li>
                    </td>
                    <td>
                        <li>
                            ..............
                        </li>
                        <li>
                            Kepala Sekolah,
                        </li>
                        <br><br><br>
                        <li>
                            <u>..............</u>
                        </li>
                        <li>
                            NIP.
                        </li>

                    </td>
                </tr>
                <tr>
                    <td>
                        <li style="list-style: none;">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <br><br>
                        <li>5</li>
                    </td>
                    <td>
                        <li style="list-style: none;">Nama Siswa</li>
                        <li>Nomor Induk</li>
                        <li>Nama Sekolah</li>
                        <li>Masuk di Sekolah Ini <br> a. Tinggal <br> b. Di Kelas</li>
                        <li>Tahun Pelajaran</li>

                    </td>
                    <td>
                        <li>
                            ..............
                        </li>
                        <li>
                            ..............
                        </li>
                        <li>
                            ..............
                        </li>
                        <br> <br>
                        <li>
                            ..............
                        </li>
                        <li>
                            ..............
                        </li>
                    </td>
                    <td>
                        <li>
                            ..............
                        </li>
                        <li>
                            Kepala Sekolah,
                        </li>
                        <br><br><br>
                        <li>
                            <u>..............</u>
                        </li>
                        <li>
                            NIP.
                        </li>

                    </td>
                </tr>

            </table>
        </div>
    </div>

    {{-- PINDAH SEKOLAH KELUAR --}}
    <div class="hal-9">
        <div class="pindah-keluar">
            <p class="title ">KETERANGAN PINDAH SEKOLAH </p>

            <p>Nama Peserta Didik : ..............</p>
            <table class="table pindah table-bordered">
                <tr style="text-align: center;">
                    <th style="text-align: center;" colspan="4">MASUK</th>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <th>Kelas yang ditinggalkan</th>
                    <th>Sebab-sebab Keluar atau Atas Permintaan (Tertulis)</th>
                    <th>Tanda Tangan Kepala Sekolah, Stempel Sekolah , dan Tanda Tangan Orang Tua/Wali</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <li>
                            ..............
                        </li>
                        <li>
                            Kepala Sekolah,
                        </li>
                        <br><br>
                        <li>
                            <u>..............</u>
                        </li>
                        <li>
                            NIP.
                        </li>
                        <li>
                            ..............
                        </li>
                        <li>
                            Orang Tua/ Wali,
                        </li>
                        <br><br>
                        <li>
                            ..............
                        </li>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <li>
                            ..............
                        </li>
                        <li>
                            Kepala Sekolah,
                        </li>
                        <br><br>
                        <li>
                            <u>..............</u>
                        </li>
                        <li>
                            NIP.
                        </li>
                        <li>
                            ..............
                        </li>
                        <li>
                            Orang Tua/ Wali,
                        </li>
                        <br><br>
                        <li>
                            ..............
                        </li>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <li>
                            ..............
                        </li>
                        <li>
                            Kepala Sekolah,
                        </li>
                        <br><br>
                        <li>
                            <u>..............</u>
                        </li>
                        <li>
                            NIP.
                        </li>
                        <li>
                            ..............
                        </li>
                        <li>
                            Orang Tua/ Wali,
                        </li>
                        <br><br>
                        <li>
                            ..............
                        </li>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>
