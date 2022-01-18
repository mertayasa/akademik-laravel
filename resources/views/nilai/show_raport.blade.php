<div class="row" id="formRaportContainer">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Raport Semester <span id="raportSemester"> {{ ucfirst($semester) }} </span>  <span id="namaRaportAnggota"> <b> {{ $anggota_kelas->siswa->nama }} </b> </span></h5>
            </div>
            <div class="card-body mt-0 pt-0">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            @include('nilai.raport_detail')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>