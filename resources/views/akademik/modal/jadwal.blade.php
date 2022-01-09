<div class="modal fade" id="jadwalModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="jadwalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jadwalModalLabel">Anggota Kelas</h5>
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

@push('scripts')
    <script>
        let select2Jadwal = $('.select2Jadwal').select2({
            theme: 'bootstrap4',
            dropdownParent: $("#jadwalModal")
        })

        const btnStoreJadwal = document.getElementById('btnStoreJadwal')
        const btnUpdateJadwal = document.getElementById('btnUpdateJadwal')
        let updateUrl

        $('#jadwalModal').on('hidden.bs.modal', function () {
            document.getElementById('idMapel').value = ''
            document.getElementById('idGuru').value = ''
            document.getElementById('hari').value = ''
            select2Jadwal.trigger('change')
            formJadwal.reset()
            clearErrorMessage()
        })

        function editJadwal(element){
            updateUrl = element.getAttribute('data-url')
            const jadwal = JSON.parse(element.getAttribute('data-jadwal'))
            btnUpdateJadwal.classList.remove('d-none')
            btnStoreJadwal.classList.add('d-none')

            document.getElementById('idKelas').value = jadwal.id_kelas
            document.getElementById('idTahunAjar').value = jadwal.id_tahun_ajar
            document.getElementById('idMapel').value = jadwal.id_mapel
            document.getElementById('idGuru').value = jadwal.id_guru
            document.getElementById('hari').value = jadwal.hari
            document.getElementById('jamMulai').value = jadwal.jam_mulai
            document.getElementById('jamSelesai').value = jadwal.jam_selesai
            select2Jadwal.trigger('change')
        }

        function createJadwal(element){
            btnStoreJadwal.classList.remove('d-none')
            btnUpdateJadwal.classList.add('d-none')
        }

        btnUpdateJadwal.addEventListener('click', event => {
            clearErrorMessage()
            const formJadwal = document.getElementById('formJadwal')
            const actionUrl = updateUrl
            const formData = new FormData(formJadwal)
            formData.append('_method', 'PATCH')
            
            fetch(actionUrl, {
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
                console.log(data)
                if (data.code == 1) {
                    $('#jadwalModal').modal('hide')
                    $('#jadwalDataTable').DataTable().ajax.reload();
                }

                showToast(data.code, data.message)
            })
            .catch((error) => {
                showToast(0, 'Gagal mengubah data jadwal')
            })
        })

        btnStoreJadwal.addEventListener('click', event => {
            clearErrorMessage()
            const formJadwal = document.getElementById('formJadwal')
            const actionUrl = formJadwal.getAttribute('action')

            fetch(actionUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                method: 'POST',
                body: new FormData(formJadwal)
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
                if (data.code == 1) {
                    $('#jadwalModal').modal('hide')
                    $('#jadwalDataTable').DataTable().ajax.reload();
                }

                showToast(data.code, data.message)
            })
            .catch((error) => {
                showToast(0, 'Gagal menambahkan data jadwal')
            })
        })
    </script>
@endpush
