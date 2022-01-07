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
            {{-- <th style="width: 30px">No</th> --}}
            <th></th>
            <th>Pelajaran</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Guru</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
<hr>
@push('scripts')
    <script>
        let jadwalTable
        let jadwalUrl = "{{ route('jadwal.datatable', [$id_kelas, $id_tahun_ajar]) }}"

        jadwalDatatable(jadwalUrl)

        function jadwalDatatable(jadwalUrl) {
            let groupColumn = 0
            jadwalTable = $('#jadwalDataTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: jadwalUrl,
                columns: [
                    // {
                    //     data: 'DT_RowIndex',
                    //     name: 'no',
                    //     orderable: false,
                    //     searchable: false,
                    //     className: "text-center align-middle"
                    // },
                    {
                        data: 'hari',
                        name: 'hari',
                    },
                    {
                        data: 'mapel.nama',
                        name: 'mapel.nama',
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
                    },
                    {
                        data: 'guru.nama',
                        name: 'guru.nama',
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
                order: [[ groupColumn, "ASC" ]],
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
