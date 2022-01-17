<table class="table table-hover table-striped" width="100%" id="{{ $custom_id ?? 'AnggotaKelasDataTable'}}" data-url="{{ route('nilai.datatable.guru') }}">
    <thead>
        <tr>
            {{-- <th style="width: 30px">No</th> --}}
            <th></th>
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
            let groupColumn = 0
            $('#{{ $custom_id ?? "AnggotaKelasDataTable"}}').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                pageLength: 50,
                lengthMenu: [10, 20, 50, 100, 200, 500],
                ajax: document.getElementById('{{ $custom_id ?? 'AnggotaKelasDataTable'}}').getAttribute('data-url'),
                columns: [
                    // {
                    //     data: 'DT_RowIndex',
                    //     name: 'no',
                    //     orderable: false,
                    //     searchable: false,
                    //     className: "text-center align-middle"
                    // },
                    {
                        data: 'nama_kelas',
                        name: 'nama_kelas',
                        visible:false,
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
                order: [
                    [0, "ASC"]
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
    </script>
@endpush
