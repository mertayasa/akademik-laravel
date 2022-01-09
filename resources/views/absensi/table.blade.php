<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td rowspan="3" class="text-center align-middle">No</td>
                <td rowspan="3" class="text-center align-middle">Nama</td>
                <td colspan="100" class="text-center">Absensi Ke-</td>
            </tr>
            <tr>
                <td colspan="{{ count($durasi_absensi_ganjil) }}" class="text-center">Semester 1</td>
                <td colspan="{{ count($durasi_absensi_genap) }}" class="text-center">Semester 2</td>
            </tr>
            <tr>
                @foreach ($durasi_absensi_ganjil as $ganjil)
                    <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ $ganjil }}">{{ $loop->iteration }}</td>
                @endforeach
                @foreach ($durasi_absensi_genap as $genap)
                    <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ $genap }}">{{ $loop->iteration }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($anggota_kelas as $key => $anggota)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <th class="text-left">{{ $anggota->siswa->nama }}</th>
                    @foreach ($durasi_absensi_ganjil as $ganjil)
                        <td class="text-center">{{ $anggota->getAbsensiByDate($ganjil) }}</td>
                    @endforeach
                    @foreach ($durasi_absensi_genap as $genap)
                        <td class="text-center">{{ $anggota->getAbsensiByDate($genap) }}</td>
                    @endforeach
                </tr>
            @empty
                <p>Belum ada absensi</p>
            @endforelse
        </tbody>
    </table>
</div>