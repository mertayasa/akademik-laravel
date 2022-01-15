@push('styles')
    <style>
        tr.group,
        tr.group:hover {
            background-color: #ddd !important;
        }
    </style>
@endpush
<table class="table table-hover" width="100%" id="jadwalDataTable">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th>Pelajaran</th>
            <th>Kelas</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
<hr>
@push('scripts')
    <script>
        let jadwalTable
        let jadwalUrl = "{{ route('jadwal.datatable.guru') }}"

        jadwalDatatable(jadwalUrl)

        function jadwalDatatable(jadwalUrl) {
            let groupColumn = 0
            jadwalTable = $('#jadwalDataTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: jadwalUrl,
                columns: [
                    {
                        data: 'hari',
                        name: 'hari',
                    },
                    {
                        data: 'kode_hari',
                        name: 'kode_hari',
                        visible: false,
                        searchable: false,
                    },
                    {
                        data: 'mapel.nama',
                        name: 'mapel.nama',
                    },
                    {
                        data: 'kelas.jenjang',
                        name: 'kelas.jenjang',
                        className: "text-center align-middle"
                    },
                    {
                        data: 'jam_mulai',
                        name: 'jam_mulai',
                        className: "text-center align-middle"
                    },
                    {
                        data: 'jam_selesai',
                        name: 'jam_selesai',
                        className: "text-center align-middle"
                    }
                ],
                displayLength: 25,
                drawCallback: function ( settings ) {
                    var api = this.api();
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;
        
                    api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                        if ( last !== group ) {
                            $(rows).eq( i ).before(
                                '<tr class="group"><td colspan="5"><b>'+group+'</b></td></tr>'
                            );
        
                            last = group;
                        }
                    } );
                },
                order: [[ 1, "ASC" ]],
                columnDefs: [
                    { 
                        visible: false, 
                        targets: groupColumn
                    },
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
