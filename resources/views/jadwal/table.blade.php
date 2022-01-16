<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mata Pelajaran</th>
                <th>Guru</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
            </tr>
        </thead>
        @foreach ($groupped_jadwal as $key => $jadwal)
            <tbody class="mb-3">
                <tr>
                    <td colspan="5" class="text-center bg-light"> <b> Kelas {{ $key }} </b></td>
                </tr>
                @php
                    $groupped_hari = $jadwal->sortBy('kode_hari')->groupBy('kode_hari');
                @endphp
                @foreach ($groupped_hari as $key => $jadwal_by_hari)
                    <tr>
                        <td colspan="5" class="bg-light"> <b> {{ getHari()[$key] }}</b></td>
                    </tr>
                    @foreach ($jadwal_by_hari as $jad_hari)
                        <tr>
                            <td>{{ $jad_hari->mapel->nama }}</td>
                            <td>{{ $jad_hari->guru->nama }}</td>
                            <td>{{ $jad_hari->jam_mulai }}</td>
                            <td>{{ $jad_hari->jam_selesai }}</td>
                        </tr>                  
                    @endforeach
                @endforeach
            </tbody>
        @endforeach
    </table>
</div>

@push('styles')
    <style>
        tbody:after {line-height:1em; content:"\200C"; display:block;}
    </style>
@endpush
