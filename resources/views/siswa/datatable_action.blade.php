@php
    $deleteUrl = "'" . route('siswa.destroy', $siswa->id) . "', 'SiswaDataTable'";
@endphp

<div class="btn-group">
    <a href=" {{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>
    <a href=" {{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show" style="margin-right: 5px" ><b> Lihat </b></a>
    <a href="#" onclick="deleteModel({{ $deleteUrl }})" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus" style="margin-right: 5px"><b> Hapus</b></a>
</div>
