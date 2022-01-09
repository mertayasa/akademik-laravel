@push('styles')
@endpush

<div class="table-responsive">
    <table class="table table-bordered">
        @php
            $durasi_count = count($durasi_absensi);
        @endphp
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
                @foreach ($durasi_absensi_ganjil as $durasi)
                    <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ $durasi }}">{{ $loop->iteration }}</td>
                @endforeach
                @foreach ($durasi_absensi_genap as $durasi)
                    <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ $durasi }}">{{ $loop->iteration }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($anggota_kelas as $key => $anggota)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <th class="text-left">{{ $anggota->siswa->nama }}</th>
                    @foreach ($durasi_absensi as $durasi)
                        <td class="text-center">{{ $anggota->getAbsensiByDate($durasi) }}</td>
                    @endforeach
                </tr>
            @empty
                <p>Belum ada absensi</p>
            @endforelse
        </tbody>
    </table>
</div>

@push('scripts')
    <script>
        function showAbsensiForm(){
            const absensiFormCon = document.getElementById('absensiFormContainer')
            absensiFormCon.classList.remove('d-none')
            absensiFormCon.scrollIntoView()
        }
    </script>
@endpush
