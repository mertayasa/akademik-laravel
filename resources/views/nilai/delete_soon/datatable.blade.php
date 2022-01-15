<table class="table table-hover table-striped" width="100%" id="NilaiDataTable">
    <thead>
        <tr>
        <th style="width: 30px">No</th>
        <th></th>
        <th>Nama Siswa</th>
        <th>Jadwal </th>
        <th>Nilai Tugas </th>
        <th>Nilai UTS </th>
        <th>Nilai UAS </th>
        <th>Deskripsi Pengetahuan </th>
        <th>Deskripsi Keterampilan </th>
        <th>Saran </th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')

<script>

    let table
    let url = "{{ route('nilai.datatable') }}"

    datatable(url)
    function datatable (url){

        table = $('#NilaiDataTable').DataTable({
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
                    data: 'anggota_kelas.id', 
                    name: 'anggota_kelas.id',
                    // className:"text-center align-middle"
                },
                 {
                    data: 'jadwal.id', 
                    name: 'jadwal.id',
                    className:"text-center align-middle"
                },
                {
                    data: 'tugas', 
                    name: 'tugas',
                    className:"text-center align-middle"
                },
                {
                    data: 'uts', 
                    name: 'uts',
                    className:"text-center align-middle"
                },
                {
                    data: 'uas', 
                    name: 'uas',
                    className:"text-center align-middle"
                },
                {
                    data: 'desk_pengetahuan', 
                    name: 'desk_pengetahuan',
                    // className:"text-center align-middle"
                },
                {
                    data: 'desk_keterampilan', 
                    name: 'desk_keterampilan',
                    // className:"text-center align-middle"
                },
                {
                    data: 'saran', 
                    name: 'saran',
                    // className:"text-center align-middle"
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
