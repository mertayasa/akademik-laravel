{{-- {{ $anggota_kelas->siswa->nama }}
<br>

{{ $anggota_kelas->getNilaiSikapValue('nama', $semester) }}
{{ $anggota_kelas->getNilaiSikapValue('sosial', $semester) }} --}}


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
    <p class="title">RAPOR PESERTA DIDIK DAN PROFLE PESERTA DIDIK</p>

    <table class="bio">
        <tr>
            <td>Nama Peserta Didik </td>
            <td> : </td>
            <td>{{ $anggota_kelas->siswa->nama }}</td>
            <td style="width:20px;"></td>
            <td>Kelas</td>
            <td>:</td>
            <td>{{ $anggota_kelas->kelas->kode }}</td>
        </tr>
        <tr>
            <td>Nomor Induk/NISN </td>
            <td> : </td>
            <td>{{ $anggota_kelas->siswa->nis }}</td>
            <td style="width:20px;"></td>
            <td>Semester</td>
            <td> : </td>
            <td>{{ getSemesterName($semester) }}</td>
        </tr>
        <tr>
            <td>Nama Sekolah </td>
            <td> : </td>
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
            <td style="width:200px;"><b>1. Sikap Spiritual </b></td>
            <td>{{ $anggota_kelas->getNilaiSikapValue('spiritual', $semester) }}</td>
        </tr>
        <tr>
            <td style="width:200px;"><b>2. Sikap Sosial </b></td>
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
            @foreach ($mapel_of_nilai as $mapel)
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
        </tbody>


</body>

</html>
