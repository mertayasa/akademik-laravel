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
                            <ol>
                                @forelse ($durasi_absensi as $durasi)
                                    <li>{{ \Carbon\Carbon::parse($durasi)->format('d-m-Y') }} <a onclick="generateForm(this, '{{ $durasi }}')"
                                            class="text-primary"
                                            data-url="{{ route('absensi.generate_form', [$id_kelas, $id_tahun_ajar]) }}">edit</a>
                                    </li>
                                @empty
                                    <li>Belum ada absen</li>
                                @endforelse
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
            let absensiDate = document.getElementById('absensiDate').value
            const absensiForm = document.getElementById('absensiForm')
            const absensiDateSpan = document.getElementById('absensiDateSpan')
            if (date != '') {
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
    </script>
@endpush
