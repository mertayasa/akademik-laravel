@extends('layouts.app')


@section('content')
    <div class="container-fluid p-0">
        <div class="card-header d-flex justify-content-between mb-5" style="align-self: flex-start; width: 40%;">
            {!! Form::open(['method' => 'get']) !!}
            {!! Form::label('user', 'Tahun Ajaran ', ['class' => 'mb-1']) !!}
            {!! Form::select('id_tahun_ajar', $tahun_ajar, $id_tahun_ajar, ['class' => 'form-control', 'id' => 'filterStatus', 'onchange' => 'updateTable()']) !!}
            <button class="btn btn-primary" type="submit">Filter</button>
            {!! Form::close() !!}
        </div>

        <div class="w-100">
            <div class="row">
                @foreach ($kelas as $data)
                    <div class="col-sm-4" id="card">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4"> Jenjang Kelas </h5>
                                <div class="card-box ">
                                    <div class="inner">
                                        <h1 class="mt-1 "> {{ $data->kode }}</h1>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                </div>
                                <p> Total Anggota : {{ count($data->getAnggotaKelas($id_tahun_ajar)) }}</p>
                                <p> Wali Kelas : {{ $data->getWaliKelas($id_tahun_ajar)[0]->user->nama ?? '-' }} </p>
                                <a href="{{ route('anggota_kelas.index', [$data->id, $id_tahun_ajar]) }}"
                                    class="btn btn-primary stretched-link">Lihat Kelas</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    @endsection

    @push('scripts')
        <script type="text/javascript" src="plugin/datatables/datatables.min.js"></script>
        <script>
            $(function() {
                $('#sampleTable').DataTable({
                    processing: true,
                    serverSide: false
                });
            });
        </script>

    @endpush
