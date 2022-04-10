
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
                        
                            <p class="sub-title">D. SARAN-SARAN</p>
                            <table class="table table-bordered">
                                <tr>
                                    <td><b> {{ $anggota_kelas->getSaranValue($semester) }} </b></td>
                                </tr>
                            </table>
                        
                            <p class="sub-title">E. TINGGI DAN BERAT BADAN</p>
                            <table class="table table-bordered">
                                <tr style="text-align: center;">
                                    <td rowspan="2"><b> No </b></td>
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
                        
                            <p class="sub-title">F. KONDISI KESEHATAN</p>
                            <table class="table table-bordered">
                                <tr style="text-align: center;">
                                    <td><b> No </b></td>
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
                                    <td><b> No </b></td>
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
                        