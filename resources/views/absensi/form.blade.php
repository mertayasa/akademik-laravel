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
                    {!! Form::radio('kehadiran['.$anggota->id.']', 'hadir', $anggota->getAbsensiByDate($tgl_absen, true) == 'hadir' ?  true : false, ['id' => 'kehadiran'.$anggota->id.'hadir']) !!}
                    {!! Form::label('kehadiran'.$anggota->id.'hadir', 'Hadir', ['class' => 'mr-2']) !!}

                    {!! Form::radio('kehadiran['.$anggota->id.']', 'ijin', $anggota->getAbsensiByDate($tgl_absen, true) == 'ijin' ?  true : false, ['id' => 'kehadiran'.$anggota->id.'ijin']) !!}
                    {!! Form::label('kehadiran'.$anggota->id.'ijin', 'Ijin', ['class' => 'mr-2']) !!}

                    {!! Form::radio('kehadiran['.$anggota->id.']', 'sakit', $anggota->getAbsensiByDate($tgl_absen, true) == 'sakit' ?  true : false, ['id' => 'kehadiran'.$anggota->id.'sakit']) !!}
                    {!! Form::label('kehadiran'.$anggota->id.'sakit', 'Sakit', ['class' => 'mr-2']) !!}

                    {!! Form::radio('kehadiran['.$anggota->id.']', 'alpa', $anggota->getAbsensiByDate($tgl_absen, true) == 'alpa' ?  true : false, ['id' => 'kehadiran'.$anggota->id.'alpa']) !!}
                    {!! Form::label('kehadiran'.$anggota->id.'alpa', 'Alpa', []) !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<button class="btn btn-primary" onclick="updateAbsensi()">Simpan</button>