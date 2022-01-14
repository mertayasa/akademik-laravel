<div class="row" id="formRaportContainer">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Raport Semester <span id="raportSemester"> {{ ucfirst($semester) }} </span>  <span id="namaRaportAnggota"> <b> {{ $anggota_kelas->siswa->nama }} </b> </span></h5>
                <a href="{{ route('nilai.export_raport', [$anggota_kelas->id, $semester]) }}" class="btn btn-primary"><i class="fas fa-file-download"></i> Cetak Raport</a>
            </div>
            <div class="card-body mt-0 pt-0">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            {!! Form::open(['method' => 'POST', 'id' => 'formUpdateRaport', 'route' => ['nilai.update_raport', [$anggota_kelas->id, $semester]]]) !!}
                                @include('nilai.form_raport')
                                <button class="btn btn-primary" type="button" id="btnUpdateRaport" onclick="updateRaport()">Simpan Nilai</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>