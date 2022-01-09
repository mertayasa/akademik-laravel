<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed p-2" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                Semester 1
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse"
            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <ol>
                    @forelse ($durasi_absensi_ganjil as $durasi)
                        <li>{{ \Carbon\Carbon::parse($durasi)->format('d-m-Y') }} <a
                                onclick="generateForm(this, '{{ $durasi }}')"
                                class="text-primary"
                                data-url="{{ route('absensi.generate_form', [$id_kelas, $id_tahun_ajar]) }}">edit</a>
                        </li>
                    @empty
                        <span>Belum ada absen</span>
                    @endforelse
                </ol>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed p-2" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                aria-expanded="false" aria-controls="collapseTwo">
                Semester 2
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse"
            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <ol>
                    @forelse ($durasi_absensi_genap as $durasi)
                        <li>{{ \Carbon\Carbon::parse($durasi)->format('d-m-Y') }} <a
                                onclick="generateForm(this, '{{ $durasi }}')"
                                class="text-primary"
                                data-url="{{ route('absensi.generate_form', [$id_kelas, $id_tahun_ajar]) }}">edit</a>
                        </li>
                    @empty
                        <span>Belum ada absen</span>
                    @endforelse
                </ol>
            </div>
        </div>
    </div>
</div>