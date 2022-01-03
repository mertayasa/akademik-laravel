<table class="table table-hover table-striped" width="100%" id="AnggotaKelasDataTable">
    <thead>
        <tr>
            <th style="width: 30px">No</th>
            <th></th>
            <th>Nama Siswa</th>
            <th>Nis</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')
    <script>
        let table
        let url = "{{ route('anggota_kelas.datatable', [$id_kelas, $id_tahun_ajar]) }}"

        datatable(url)

        function datatable(url) {

            table = $('#AnggotaKelasDataTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: url,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'no',
                        orderable: false,
                        searchable: false,
                        className: "text-center align-middle"
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        visible: false,
                        searchable: false
                    },
                    {
                        data: 'siswa.nama',
                        name: 'siswa.nama',
                        // className:"text-center align-middle"
                    },
                    {
                        data: 'siswa.nis',
                        name: 'siswa.nis',
                        className: "text-center align-middle"
                    },
                    {
                        data: 'siswa.jenis_kelamin',
                        name: 'siswa.jenis_kelamin',
                        className: "text-center align-middle"
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: "text-center align-middle"

                    }
                ],
                order: [
                    [1, "DESC"]
                ],
                columnDefs: [
                    {
                        targets: '_all',
                        className: 'align-middle'
                    },
                    {
                        responsivePriority: 1,
                        targets: 1
                    },
                ],
                language: {
                    search: "",
                    searchPlaceholder: "Cari"
                },
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('select:not(.custom-select)').select2({
                theme: 'bootstrap4',
                dropdownParent: $("#studentModal")
            });
        })

        const btnStoreStudent = document.getElementById('btnStoreStudent')

        btnStoreStudent.addEventListener('click', event => {
            const formAdd = document.getElementById('formAddStudent')
            const actionUrl = formAdd.getAttribute('action')

            fetch(actionUrl, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                method: 'POST',
                body: new FormData(formAdd)
            })
            .then(response => {
                const data = response.json()
                if (response.status == 400) {
                    data.then((res) => {
                        const error = res.errors
                        Object.keys(error).forEach(function(key) {
                            let errorSpan = document.querySelectorAll(`[error-name="${key}"]`)
                            let errorInput = document.querySelectorAll(`[name="${key}"]`)
                            errorInput[0].classList.add('is-invalid')
                            if(errorSpan){
                                errorSpan[0].innerHTML = error[key][0]
                            }
                        })
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
