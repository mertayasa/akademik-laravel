<table class="table table-hover table-striped" width="100%" id="PengumumanDataTable">
    <thead>
        <tr>
        <th style="width: 30px">No</th>
        <th></th>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Konten</th>
        <th>Lampiran</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')

<script>

    let table
    let url = "{{ route('pengumuman.datatable') }}"

    datatable(url)
    function datatable (url){

        table = $('#PengumumanDataTable').DataTable({
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
                    data: 'judul', 
                    name: 'judul'
                },
                {
                    data: 'deskripsi', 
                    name: 'deskripsi'
                },
                {
                    data: 'konten', 
                    name: 'konten'
                },
                {
                    data: 'lampiran', 
                    name: 'lampiran'
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
