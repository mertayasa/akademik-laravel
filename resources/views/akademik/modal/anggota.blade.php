<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Anggota Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'anggota_kelas.store', 'id' => 'formAddStudent']) !!}
                <div class="row">
                    {!! Form::hidden('id_kelas', $id_kelas, []) !!}
                    {!! Form::hidden('id_tahun_ajar', $id_tahun_ajar, []) !!}
                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('idSiswa', 'Nama Siswa', ['class' => 'mb-1']) !!}
                        {!! Form::select('id_siswa', ['' => 'Pilih Siswa'] + $siswa->toArray(), null, ['class' => 'form-control select2Student', 'id' => 'idSiswa']) !!}
                        <div class="invalid-feedback" error-name="id_siswa">
                        </div>
                    </div>
                    <small> <i>Silahkan pilih siswa yang ingin ditambahkan di kelas</i> </small>
                </div>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btnStoreStudent">Simpan</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            // $('select:not(.custom-select)').select2({
            $('.select2Student').select2({
                theme: 'bootstrap4',
                dropdownParent: $("#studentModal")
            });
        })

        const btnStoreStudent = document.getElementById('btnStoreStudent')

        function createAnggota(){
            clearErrorMessage()
        }

        btnStoreStudent.addEventListener('click', event => {
            const formAdd = document.getElementById('formAddStudent')
            const actionUrl = formAdd.getAttribute('action')

            fetch(actionUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                method: 'POST',
                body: new FormData(formAdd)
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
                if(data.code == 1){
                    $('#studentModal').modal('hide')
                    $('#AnggotaKelasDataTable').DataTable().ajax.reload();
                }

                showToast(data.code, data.message)
            })
            .catch((error) => {
                showToast(0, 'Gagal menambahkan data anggota kelas')
            })
        })
    </script>
@endpush