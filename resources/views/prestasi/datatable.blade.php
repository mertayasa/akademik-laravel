<table class="table table-hover table-striped" width="100%" id="PrestasiDataTable">
    <thead>
        <tr>
        <th style="width: 30px">No</th>
        <th></th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Tahun Ajar</th>
        <th>Semester</th>
        <th>Jenis Prestasi</th>
        <th>Keterangan</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')

<script>

    let table
    let url = "{{ route('prestasi.datatable') }}"

    datatable(url)
    function datatable (url){

        table = $('#PrestasiDataTable').DataTable({
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
                    data: 'anggota_kelas.siswa.nama', 
                    name: 'anggota_kelas.siswa.nama',
                },
                {
                    data: 'nama_kelas', 
                    name: 'nama_kelas',
                },
                {
                    data: 'tahun_ajar', 
                    name: 'tahun_ajar',
                },
                {
                    data: 'semester', 
                    name: 'semester',
                    className:"text-center align-middle"
                },
                {
                    data: 'jenis', 
                    name: 'jenis',
                    className:"text-center align-middle"
                },
                {
                    data: 'keterangan', 
                    name: 'keterangan',
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
