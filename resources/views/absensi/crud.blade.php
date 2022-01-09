<div class="row d-none" id="absensiFormContainer">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-12 col-md-4">
                    {!! Form::label('absensiDate', 'Pilih Tanggal Pertemuan', ['class' => 'mb-2']) !!}
                    <div class="input-group mb-3">
                        {!! Form::date('tgl_absensi', null, ['class' => 'form-control', 'id' => 'absensiDate']) !!}
                        <div class="input-group-append ml-2">
                            <button class="btn btn-outline-primary"
                                data-url="{{ route('absensi.generate_form', [$id_kelas, $id_tahun_ajar]) }}"
                                onclick="generateForm(this)" type="button">Generate Form</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-12 mt-3">
                    <div class="row">
                        <div class="col-3">
                            <h6>Tanggal yang sudah diabsen : </h6>
                            <ol class="pl-0">
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

                            </ol>
                        </div>
                        <div class="col-9">
                            <h6>Absensi Tanggal <span id="absensiDateSpan"> <small>[Pilih Tanggal Absensi]</small>
                                </span> </h6>
                            <div id="absensiForm">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function generateForm(element, date = '') {
            const actionUrl = element.getAttribute('data-url')
            const absensiDateInput = document.getElementById('absensiDate')
            let absensiDate = absensiDateInput.value
            const absensiForm = document.getElementById('absensiForm')
            const absensiDateSpan = document.getElementById('absensiDateSpan')
            if (date != '') {
                absensiDateInput.value = date
                absensiDate = date
            }

            if (absensiDate == '') {
                return showToast(0, 'Tanggal tidak boleh kosong')
            }

            absensiDateSpan.innerHTML = absensiDate

            fetch(actionUrl + '/' + absensiDate, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    method: 'GET'
                })
                .then(response => {
                    const data = response.json()
                    if (response.status == 400) {
                        data.then((res) => {
                            const errors = res.errors
                            showValidationMessage(errors)
                        })
                    }
                    return data
                })
                .then(data => {
                    absensiForm.innerHTML = ''
                    if (data.code == 1) {
                        return absensiForm.insertAdjacentHTML('beforeend', data.form)
                    } else {
                        return showToast(data.code, data.message)
                    }

                })
                .catch((error) => {
                    showToast(0, 'Gagal mengubah data jadwal')
                })
        }

        function updateAbsensi(){
            const postAbsensiForm = document.getElementById('postAbsensiForm')
            const formData = new FormData(postAbsensiForm)

            console.log(postAbsensiForm);
            for (var pair of formData.entries()) {
                console.log(pair[0]+ ', ' + pair[1]); 
            }

            fetch(postAbsensiForm.getAttribute('action'), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    const data = response.json()
                    if (response.status == 400) {
                        data.then((res) => {
                            const errors = res.errors
                            showValidationMessage(errors)
                        })
                    }
                    return data
                })
                .then(data => {
                    console.log(data);
                    // return showToast(data.code, data.message)
                })
                .catch((error) => {
                    showToast(0, 'Gagal mengubah absensi')
                })
        }
    </script>
@endpush
