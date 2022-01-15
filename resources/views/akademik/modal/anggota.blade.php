<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Anggota Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'anggota_kelas.store', 'id' => 'formAddStudent']) !!}
                <div class="row">
                    {!! Form::hidden('id_kelas', $id_kelas, []) !!}
                    {!! Form::hidden('id_tahun_ajar', $id_tahun_ajar, []) !!}
                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('idSiswa', 'Nama Siswa', ['class' => 'mb-1']) !!}
                        {!! Form::select('id_siswa', ['' => 'Pilih Siswa'] + $siswa->toArray(), null, ['class' => 'form-control select2Student', 'id' => 'idSiswa']) !!}
                        <div class="invalid-feedback" error-name="id_siswa">
                        </div>
                    </div>
                    <small> <i>Silahkan pilih siswa yang ingin ditambahkan di kelas</i> </small>
                </div>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btnStoreStudent">Simpan</button>
            </div>
        </div>
    </div>
</div>