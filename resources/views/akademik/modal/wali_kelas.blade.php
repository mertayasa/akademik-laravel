{{-- @dump($wali_kelas) --}}
<div class="modal fade" id="waliKelasModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="waliKelasModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="waliKelasModalLabel">Wali Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['wali_kelas.set', [$id_kelas, $id_tahun_ajar]], 'id' => 'formWaliKelas']) !!}
                    <div class="row">
                        <div class="col-12 pb-3 pb-md-0 mb-2">
                            {!! Form::label('selectIdGuru', 'Nama Guru', ['class' => 'mb-1']) !!}
                            {!! Form::select('id_guru', ['' => 'Pilih Guru'] + $guru->toArray(), null, ['class' => 'form-control select2Wali', 'id' => 'selectIdGuru', 'data-selected' => isset($wali_kelas) ? $wali_kelas->id_user : null]) !!}
                            <div class="invalid-feedback" error-name="id_guru">
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btnSetWaliKelas" onclick="setWaliKelas()">Simpan</button>
            </div>
        </div>
    </div>
</div>