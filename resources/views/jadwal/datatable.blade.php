<table class="table table-hover table-striped" width="100%" id="JadwalDataTable">
    <thead>
        <tr>
        <th style="width: 30px">No</th>
        <th></th>
        <th>Hari</th>
        <th>Kode Kelas</th>
        <th>Mata Pelajaran</th>
        <th>Nama Guru</th>
        <th>Jam Mulai</th>
        <th>Jam Selesai</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')

<script>

    let table
    let url = "{{ route('jadwal.datatable') }}"

    datatable(url)
    function datatable (url){

        table = $('#JadwalDataTable').DataTable({
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
                    data: 'hari', 
                    name: 'hari',
                    // className:"text-center align-middle"
                },
                {
                    data: 'kelas.kode', 
                    name: 'kelas.kode',
                    className:"text-center align-middle"
                },
                {
                    data: 'mapel.nama', 
                    name: 'mapel.nama',
                    // className:"text-center align-middle"
                },
                {
                    data: 'user.nama', 
                    name: 'user.nama',
                    // className:"text-center align-middle"
                },
                {
                    data: 'jam_mulai', 
                    name: 'jam_mulai',
                    className:"text-center align-middle"
                },
                {
                    data: 'jam_selesai', 
                    name: 'jam_selesai',
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
