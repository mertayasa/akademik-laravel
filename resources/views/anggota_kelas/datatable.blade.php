<table class="table table-hover table-striped" width="100%" id="AnggotaKelasDataTable" data-url="{{ route('anggota_kelas.datatable', [$id_kelas, $id_tahun_ajar, ($custom_action ?? '')]) }}">
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
        let url = "{{ route('anggota_kelas.datatable', [$id_kelas, $id_tahun_ajar]) }}"

        datatable(url)

        function datatable(url) {

            $('#AnggotaKelasDataTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: document.getElementById('AnggotaKelasDataTable').getAttribute('data-url'),
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
@endpush
