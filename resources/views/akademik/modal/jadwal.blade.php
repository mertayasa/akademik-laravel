<div class="modal fade" id="jadwalModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="jadwalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jadwalModalLabel">Jadwal Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'jadwal.store', 'id' => 'formJadwal']) !!}
                {{-- @method('patch') --}}
                <div class="row">
                    {!! Form::hidden('id_kelas', $id_kelas, ['id' => 'idKelas']) !!}
                    {!! Form::hidden('id_tahun_ajar', $id_tahun_ajar, ['id' => 'idTahunAjar']) !!}

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('idMapel', 'Nama Mapel', ['class' => 'mb-1']) !!}
                        {!! Form::select('id_mapel', ['' => 'Pilih Mata Pelajaran'] + $mapel->toArray(), null, ['class' => 'form-control select2Jadwal', 'id' => 'idMapel']) !!}
                        <div class="invalid-feedback" error-name="id_mapel">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('idGuru', 'Nama Guru', ['class' => 'mb-1']) !!}
                        {!! Form::select('id_guru', ['' => 'Pilih Guru'] + $guru->toArray(), null, ['class' => 'form-control select2Jadwal', 'id' => 'idGuru']) !!}
                        <div class="invalid-feedback" error-name="id_guru">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('hari', 'Hari', ['class' => 'mb-1']) !!}
                        {!! Form::select('hari', ['' => 'Pilih Hari', 'Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat', 'Sabtu' => 'Sabtu', 'Minggu' => 'Minggu'], null, ['class' => 'form-control select2Jadwal', 'id' => 'hari']) !!}
                        <div class="invalid-feedback" error-name="hari">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('jamMulai', 'Jam Mulai', ['class' => 'mb-1']) !!}
                        {!! Form::time('jam_mulai', null, ['class' => 'form-control', 'id' => 'jamMulai']) !!}
                        <div class="invalid-feedback" error-name="jam_mulai">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('jamSelesai', 'Jam Selesai', ['class' => 'mb-1']) !!}
                        {!! Form::time('jam_selesai', null, ['class' => 'form-control', 'id' => 'jamSelesai']) !!}
                        <div class="invalid-feedback" error-name="jam_selesai">
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary d-none" id="btnStoreJadwal">Simpan</button>
                <button type="button" class="btn btn-primary d-none" id="btnUpdateJadwal">Update</button>
            </div>
        </div>
    </div>
</div>