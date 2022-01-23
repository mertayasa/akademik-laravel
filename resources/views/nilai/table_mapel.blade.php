<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                {{-- @if (Auth::user()->isAdmin())
                    <th>Aksi</th>
                @endif --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($mapel_of_jadwal as $mapel)
                <tr>
                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                    <td class="text-center align-middle">{{ $mapel->nama }}</td>
                    {{-- @if (Auth::user()->isAdmin())
                        <td class="text-center align-middle">
                            <button class="btn btn-danger" data-url="{{ route('nilai.destroy_mapel', [$id_kelas, $id_tahun_ajar, $mapel->id]) }}" onclick="deleteMapelFromNilai(this)">Hapus</button>
                        </td>
                    @endif --}}
                </tr>                
            @endforeach
        </tbody>
    </table>
</div>