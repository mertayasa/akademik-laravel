@extends('layouts.app')


@section('content')
    <div class="container-fluid p-0">

                <div class="w-100">
                    <div class="row">
                        @foreach ($kelas as $data)
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4"> Jenjang Kelas </h5>
                                    <div class="card-box ">
                                <div class="inner">
                                    <h1 class="mt-1 "> {{$data->kode}}</h1>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                </div>
                                    <p> Total Anggota :  </p>
                                    <p> Wali Kelas :  </p>
                                    <a href="{{ route('siswa.index', $data->id) }}" class="btn btn-primary stretched-link">Lihat Kelas</a>
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
        $(function () {
            $('#sampleTable').DataTable({
                processing: true,
                serverSide: false
            });
        });
    </script>
@endpush