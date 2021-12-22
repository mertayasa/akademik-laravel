<table class="table table-hover table-striped" width="100%" id="TahunAjarDataTable">
    <thead>
        <tr>
        <th style="width: 30px">No</th>
        <th></th>
        <th>Keterangan</th>
        <th>Tahun Mulai</th>
        <th>Tahun Selesai</th>
        <th>Status</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')

<script>

    let table
    let url = "{{ route('tahun_ajar.datatable') }}"

    datatable(url)
    function datatable (url){

        table = $('#TahunAjarDataTable').DataTable({
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
                    data: 'keterangan', 
                    name: 'keterangan',
                    // className:"text-center align-middle"
                },
                {
                    data: 'tahun_mulai', 
                    name: 'tahun_mulai',
                    className:"text-center align-middle"
                },
                {
                    data: 'tahun_selesai', 
                    name: 'tahun_selesai',
                    className:"text-center align-middle"
                },
                {
                    data: 'status', 
                    name: 'status',
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
