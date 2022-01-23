<div class="row d-none" id="mapelListContainer">
    <div class="col-12">
        <div class="card">
            {{-- <div class="card-header d-flex justify-content-end">
                @if (Auth::user()->isAdmin())
                    <button data-bs-toggle="modal" data-bs-target="#mapelNilaiModal" class="btn btn-primary add"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Mata Pelajaran">
                        <i class="fas fa-folder-plus"></i> Tambah Mata Pelajaran</button>
                @endif
            </div> --}}
            <div class="card-body ">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            <span> Mata pelajaran yang dinilai <small> <b> * Klik untuk melihat *
                                                    </b></small></span>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div id="mapelListTable">
                                                @include('nilai.table_mapel')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
