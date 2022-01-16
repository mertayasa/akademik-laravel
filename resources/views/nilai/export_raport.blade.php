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
        <thead class="text-center table-nilai" style="font-weight: 200">
            <tr style="align-item: middle;">
                <td rowspan=" 2" style="align-item: middle;">No</td>
                <td rowspan="2">Mata Pelajaran</td>
                <td colspan="3">Pengetahuan</td>
                <td colspan="3">Keterampilan</td>
            </tr>
            <tr>
                <td>Angka</td>
                <td>Predikat</td>
                <td>Deskripsi</td>
                <td>Angka</td>
                <td>Predikat</td>
                <td>Deskripsi</td>
            </tr>
        </thead>
    </table>


</body>

</html>
