<table id="kelasTable{{ $hari }}" class="table table-striped table-hover">
    <thead>
        <tr>
            <td>Hari</td>
            <td>Pelajaran</td>
            <td>Jam</td>
            <td>Guru</td>
            @isset($show_kelas)
                <td>Kelas</td>
            @endisset
            @if (roleName() == 'admin')
                <td>Action</td>
            @endif
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="10">
                <strong>
                    <h4 class="mb-0">{{ $hari }}</h4>
                </strong>
            </td>
        </tr>
        @forelse ($jadwal as $jad)
            <tr>
                <td></td>
                <td>{{ $jad->mapel->nama }}</td>
                <td>{{ $jad->jam_mulai }} - {{ $jad->jam_selesai }}</td>
                <td>{{ $jad->user->nama }}</td>
                @isset($show_kelas)
                    <td>Kelas {{ $jad->kelas->jenjang }}</td>
                @endisset
                @if (roleName() == 'admin')
                    <td>
                        action
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center"> Tidak Ada Data </td>
            </tr>
        @endforelse
    </tbody>
</table>