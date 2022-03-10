<table class="table table-hover table-striped" width="100%" id="SiswaDataTable">
    <thead>
        <tr>
        <th style="width: 30px">No</th>
        <th></th>
        <th>Foto</th>
        <th>Nama</th>
        <th>Nis</th>
        <th>Jenis Kelamin</th>
        @if (Auth::user()->isAdmin())
            <th>Status</th>
        @endif
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')

<script>

    let table
    let url = "{{ $datatable_url ?? route('siswa.datatable') }}"
    const isAdmin = "{{ Auth::user()->isAdmin() }}"

    datatable(url)
    function datatable (url){
        let columns = [ 
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
                data: 'foto', 
                name: 'foto',
                className: "text-center align-middle"
            },
            {
                data: 'nama', 
                name: 'nama'
            },
            {
                data: 'nis', 
                name: 'nis',
                className:"text-center align-middle"
            },
            {
                data: 'jenis_kelamin', 
                name: 'jenis_kelamin',
                className:"text-center align-middle"
            }
        ]

        if(isAdmin == true){
            columns.push({
                data: 'status', 
                name: 'status',
                className:"text-center align-middle"
            })
        }

        columns.push({
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            className:"text-center align-middle"
        })
        

        table = $('#SiswaDataTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: url,
            columns: columns,
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
