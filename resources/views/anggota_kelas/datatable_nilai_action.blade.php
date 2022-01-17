<div class="btn-group">
    <a href="javascript:void(0)" onclick="showNilaiRaport(`{{ route('nilai.edit_raport', [$anggota_kelas->id, 'ganjil']) }}`)" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nilai Smt Ganjil" style="margin-right: 5px"><b> Smt Ganjil</b></a>
    <a href="javascript:void(0)" onclick="showNilaiRaport(`{{ route('nilai.edit_raport', [$anggota_kelas->id, 'genap']) }}`)" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nilai Smt Genap" style="margin-right: 5px"><b> Smt Genap</b></a>
</div>