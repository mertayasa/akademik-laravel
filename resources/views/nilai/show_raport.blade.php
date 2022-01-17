<div class="row" id="formRaportContainer">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Raport Semester <span id="raportSemester"> {{ ucfirst($semester) }} </span>  <span id="namaRaportAnggota"> <b> {{ $anggota_kelas->siswa->nama }} </b> </span></h5>
            </div>
            <div class="card-body mt-0 pt-0">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            

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
                                    <tr>
                                        <td colspan="8"><b> Muatan Lokal </b></td>
                                    </tr>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($mapel_of_nilai as $mapel)
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
                                    <td><b> No </b></td>
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













                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>