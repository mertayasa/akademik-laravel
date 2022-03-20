{{-- @php
    $deleteUrl = "'" . route('siswa.destroy', $siswa->id) . "', 'SiswaDataTable'";
@endphp --}}

<div class="btn-group">
    @if ($tahun_ajar->status == 'nonaktif')
        <a href="#" onclick="setActive(this)" data-url="{{ route('tahun_ajar.set_aktif', $tahun_ajar->id) }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Set Aktif" style="margin-right: 5px"><b>Set Aktif</b></a>
    @endif
    <a href="{{ route('tahun_ajar.edit', $tahun_ajar->id) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b>Edit</b></a>
    {{-- // '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b>Hapus</b></a>' . --}}
</div>