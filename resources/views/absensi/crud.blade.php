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
                    <span class="text-danger">Tanggal Valid Tahun Ajar {{ $tahun_ajar->tahun_mulai }}-{{ $tahun_ajar->tahun_mulai }} : </span>
                    <ul>
                        <li>Semester 1 : {{ \Carbon\Carbon::parse($tahun_ajar->mulai_smt_ganjil)->format('d-m-Y') }} s/d {{ \Carbon\Carbon::parse($tahun_ajar->selesai_smt_ganjil)->format('d-m-Y') }}</li>
                        <li>Semester 2 : {{ \Carbon\Carbon::parse($tahun_ajar->mulai_smt_genap)->format('d-m-Y') }} s/d {{ \Carbon\Carbon::parse($tahun_ajar->selesai_smt_genap)->format('d-m-Y') }}</li>
                    </ul>
                </div>
                <hr>
                <div class="col-12 mt-3">
                    <div class="row">
                        {{-- <div class="col-3">
                            <h6>Tanggal yang sudah diabsen : </h6>
                            <ol class="pl-0" id="dateListContainer">
                                @include('absensi.date_list')
                            </ol>
                        </div> --}}
                        <div class="col-12">
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
        function showAbsensiForm(){
            const absensiFormCon = document.getElementById('absensiFormContainer')
            absensiFormCon.classList.remove('d-none')
            absensiFormCon.scrollIntoView()
        }
        
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
            const absensiContainer = document.getElementById('absensiContainer')
            const dateListContainer = document.getElementById('dateListContainer')
            const formData = new FormData(postAbsensiForm)

            formData.append('id_kelas', "{{ $id_kelas }}")
            formData.append('id_tahun_ajar', "{{ $id_tahun_ajar }}")

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
                // dateListContainer.innerHTML = ''
                absensiContainer.innerHTML = ''
                // dateListContainer.insertAdjacentHTML('beforeend', data.date_list)
                absensiContainer.insertAdjacentHTML('beforeend', data.table)
                absensiContainer.scrollIntoView()
                return showToast(data.code, data.message)
            })
            .catch((error) => {
                console.log(error);
                showToast(0, 'Gagal mengubah absensi')
            })
        }
    </script>
@endpush
