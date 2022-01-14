<div class="row d-none" id="formRaportContainer">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h5>Raport Semester [Semester] [Nama Siswa]</h5>
            </div>
            <div class="card-body mt-0 pt-0">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            {!! Form::open(['method' => 'POST', 'id' => 'updateRaport', 'route' => ['nilai.update_raport', [$id_anggota_kelas = 1]]]) !!}
                                @include('nilai.form_raport')
                                <a href="javascript:void(0)" class="btn btn-primary" id="btnUpdateRaport">Simpan Nilai</a>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
