<div class="modal fade" id="mapelNilaiModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="mapelNilaiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapelNilaiModalLabel">Anggota Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['nilai.store_mapel', [$id_kelas, $id_tahun_ajar]], 'id' => 'formMapelNilai']) !!}
                <div class="row">
                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('idMapel', 'Nama Mapel', ['class' => 'mb-1']) !!}
                        {!! Form::select('id_mapel', ['' => 'Pilih Mata Pelajaran'] + $mapel->toArray(), null, ['class' => 'form-control select2Jadwal', 'id' => 'idMapel']) !!}
                        <div class="invalid-feedback" error-name="id_mapel">
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btnStoreMapelNilai" onclick="storeMapelNilai()">Simpan</button>
            </div>
        </div>
    </div>
</div>