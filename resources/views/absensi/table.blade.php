<div class="col-12 px-0">
    @if (count($period['group_bulan']) > 0)
        @php $key_ganjil = 1 @endphp
        @foreach ($period['group_bulan'] as $group_key => $group_ganjil)
            <div class="table-responsive mb-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" width="5%" class="text-center align-middle">Induk</th>
                            <th rowspan="2" style="min-width:300px" class="text-center align-middle">Nama</th>
                            <th colspan="{{ $group_ganjil['count_absen'] }}" class="text-center">
                                {{ $group_ganjil['month_name'] }}</th>
                            <th colspan="3" class="text-center align-middle">Keterangan</th>
                            <th rowspan="2" class="text-center align-middle">Jml</th>
                        </tr>
                        <tr>
                            @if (count($period) == 0)
                                <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="">
                                    Belum ada absensi</td>
                            @else
                                @foreach ($period['absensi'] as $key_abs => $tgl_ganjil)
                                    @if (str_contains($tgl_ganjil['tanggal'], $group_key))
                                        <td rowspan="2" class="text-center px-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" style="cursor: pointer;"
                                            title="{{ $tgl_ganjil['tanggal'] }}">{{ $key_ganjil++ }}</td>
                                    @endif
                                @endforeach
                            @endif
                            <td class="text-center"> <b> S </b></td>
                            <td class="text-center"> <b> I </b></td>
                            <td class="text-center"> <b> A </b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 0 @endphp
                        @foreach ($anggota_kelas as $key => $anggota)
                            <tr>
                                <td class="text-center">{{ $anggota->siswa->nis }}</td>
                                <th class="text-left">{{ $anggota->siswa->nama }}</th>
                                @if (count($period['absensi']) == 0)
                                    <td class="text-center"></td>
                                @else
                                    @php
                                        $count_sakit = 0;
                                        $count_ijin = 0;
                                        $count_tanpa_ket = 0;
                                        $count_tanpa_absen = 0;
                                    @endphp
                                    @foreach ($period['absensi'] as $key_abs => $tgl_ganjil)
                                        @if (str_contains($tgl_ganjil['tanggal'], $group_key))
                                            @php
                                                $status_absensi = $anggota->getAbsensiByDate($tgl_ganjil['tanggal']);
                                                if ($status_absensi == 'S') {
                                                    $count_sakit++;
                                                }

                                                if ($status_absensi == 'I') {
                                                    $count_ijin++;
                                                }

                                                if ($status_absensi == 'A') {
                                                    $count_tanpa_ket++;
                                                }

                                                if ($status_absensi == '-') {
                                                    $count_tanpa_absen++;
                                                }
                                            @endphp
                                            <td class="text-center px-1">{{ $status_absensi }}</td>
                                        @endif
                                    @endforeach
                                @endif
                                <td class="text-center"> <b> {{ $count_sakit == 0 ? '-' : $count_sakit }} </b>
                                </td>
                                <td class="text-center"> <b> {{ $count_ijin == 0 ? '-' : $count_ijin }} </b> </td>
                                <td class="text-center"> <b> {{ $count_tanpa_ket == 0 ? '-' : $count_tanpa_ket }}
                                    </b> </td>
                                <td class="text-center"> 
                                    <b>
                                        {{ $count_tanpa_ket + $count_ijin + $count_sakit == 0 ? '-' : $count_tanpa_ket + $count_ijin + $count_sakit }}
                                    </b>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @php $key_ganjil = 1 @endphp
        @endforeach
    @else
        <p class="text-center">Belum ada absensi</p>
    @endif
</div>
