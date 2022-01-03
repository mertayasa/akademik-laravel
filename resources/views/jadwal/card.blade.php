<div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <strong>
                        <h4>{{ $nama_hari }}</h4>
                    </strong>
                </div>
                <div class="card-body">
                    <table id="kelasTable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>Pelajaran</td>
                                <td>Jam</td>
                                <td>Kelas</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($jadwal) > 0)
                                @forelse ($jadwal_kelas as $jadwal)
                                    
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center"> Tidak Ada Data </td>
                                    </tr>
                                @endforelse
                            @endif
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
</div>