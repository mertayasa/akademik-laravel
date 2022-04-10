{!! Form::open(['route' => ['absensi.update_create', [$semester, $tgl_absen]], 'method' => 'POST', 'id' => 'postAbsensiForm']) !!}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kehadiran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota_kelas as $anggota)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $anggota->siswa->nama }}</td>
                    <td class="text-center">
                        @php
                            $status_absensi = $anggota->getAbsensiByDate($tgl_absen, true);
                        @endphp
                        {!! Form::radio('kehadiran['.$anggota->id.']', 'hadir', $status_absensi == 'hadir' ?  true : false, ['id' => 'kehadiran'.$anggota->id.'hadir']) !!}
                        {!! Form::label('kehadiran'.$anggota->id.'hadir', 'Hadir', ['class' => 'mr-2']) !!}

                        {!! Form::radio('kehadiran['.$anggota->id.']', 'ijin', $status_absensi == 'ijin' ?  true : false, ['id' => 'kehadiran'.$anggota->id.'ijin']) !!}
                        {!! Form::label('kehadiran'.$anggota->id.'ijin', 'Ijin', ['class' => 'mr-2']) !!}

                        {!! Form::radio('kehadiran['.$anggota->id.']', 'sakit', $status_absensi == 'sakit' ?  true : false, ['id' => 'kehadiran'.$anggota->id.'sakit']) !!}
                        {!! Form::label('kehadiran'.$anggota->id.'sakit', 'Sakit', ['class' => 'mr-2']) !!}

                        {!! Form::radio('kehadiran['.$anggota->id.']', 'alpa', $status_absensi == 'alpa' || $status_absensi == '-' ?  true : false, ['id' => 'kehadiran'.$anggota->id.'alpa']) !!}
                        {!! Form::label('kehadiran'.$anggota->id.'alpa', 'Alpa', []) !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{!! Form::close() !!}


<button class="btn btn-primary" onclick="updateAbsensi()">Simpan</button>
