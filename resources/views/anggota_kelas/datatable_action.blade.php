<div class="btn-group">
    <a href="{{ route('siswa.show', $anggota_kelas->siswa->id)   }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat Profil" style="margin-right: 5px" > <b> Profil </b> </a>
    {{-- <a href="#" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat Nilai" style="margin-right: 5px" ><b> Nilai</b></a> --}}
    @if (Auth::user()->isAdmin())
        <a href="#" onclick="deleteModel(`{{ route('anggota_kelas.destroy', $anggota_kelas->id) }}`, 'AnggotaKelasDataTable')" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Dari Kelas" style="margin-right: 5px"><b> Hapus</b></a>
    @endif
</div>