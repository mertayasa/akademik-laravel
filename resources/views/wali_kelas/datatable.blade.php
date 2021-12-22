<table class="table table-hover table-striped" width="100%" id="WaliKelasDataTable">
    <thead>
        <tr>
        <th style="width: 30px">No</th>
        <th></th>
        <th>Nama Kelas</th>
        <th>Tahun Ajaran</th>
        <th>Nama Guru</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')

<script>

    let table
    let url = "{{ route('wali_kelas.datatable') }}"

    datatable(url)
    function datatable (url){

        table = $('#WaliKelasDataTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: url,
            columns: [ 
                {
                    data: 'DT_RowIndex',
                    name: 'no',
                    orderable: false,
                    searchable: false,
                    className:"text-center align-middle"
                },
                {
                    data: 'updated_at', 
                    name: 'updated_at',
                    visible: false,
                    searchable: false
                },
                {
                    data: 'kelas.kode', 
                    name: 'kelas.kode',
                    className:"text-center align-middle"
                },
                {
                    data: 'tahun_ajar.keterangan', 
                    name: 'tahun_ajar.keterangan',
                    className:"text-center align-middle"
                },
                {
                    data: 'user.nama', 
                    name: 'user.nama',
                    className:"text-center align-middle"
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className:"text-center align-middle"

                }
            ],
            order: [[ 1, "DESC" ]],
            columnDefs: [
                // { width: 300, targets: 1 },
                {
                    targets:  '_all',
                    className: 'align-middle'
                },
                {
                    responsivePriority: 1, targets: 1
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
