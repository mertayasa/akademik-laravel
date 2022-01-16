@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
@endpush

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3> Dashboard</h3>
            </div>

            <div class="col-auto ml-auto text-right mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="#">Sistem Informasi Akademik</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body ">
                                    <h5 class="card-title text-white mb-4">Total Siswa</h5>
                                    <h1 class="mt-1 mb-3 text-white">{{ $dashboard_data['siswa_count'] }} </h1>
                                    <div class="mb-1 detail justify-content-end">
                                        <a href="{{ route('siswa.index') }}">Lihat Detail <i
                                                class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <h5 class="card-title  text-white mb-4">Total Guru</h5>
                                    <h1 class="mt-1 mb-3 text-white">{{ $dashboard_data['guru_count'] }}</h1>
                                    <div class="mb-1 detail justify-content-end">
                                        <a href="{{ route('guru.index') }}">Lihat Detail <i
                                                class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h5 class="card-title  text-white mb-4">Total Orang Tua</h5>
                                    <h1 class="mt-1 mb-3 text-white">{{ $dashboard_data['ortu_count'] }}</h1>
                                    <div class="mb-1 detail justify-content-end">
                                        <a href="{{ route('ortu.index') }}">Lihat Detail <i
                                                class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title  text-white mb-4">Total Mata Pelajaran</h5>
                                    <h1 class="mt-1 mb-3 text-white">{{ $dashboard_data['mapel_count'] }}</h1>
                                    <div class="mb-1 detail justify-content-end">
                                        <a href="{{ route('mapel.index') }}">Lihat Detail <i
                                                class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title  text-white mb-4">Total Ekstrakulikuler</h5>
                                    <h1 class="mt-1 mb-3 text-white">{{ $dashboard_data['ekskul_count'] }}</h1>
                                    <div class="mb-1 detail justify-content-end">
                                        <a href="{{ route('ekskul.index') }}">Lihat Detail <i
                                                class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @if (Auth::user()->isGuru())
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class=" mb-0 ">Jadwal Mengajar</h4>
                </div>
                <div class="card-body">
                    @include('jadwal.datatable_guru')
                </div>
            </div>
        @endif

        <div class="row">
            @include('dashboard.pengumuman')
        </div>


        {{-- <div class="row">
            <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Browser Usage</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="py-3">
                                <div class="chart chart-xs">
                                    <canvas id="chartjs-dashboard-pie"></canvas>
                                </div>
                            </div>

                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td>Chrome</td>
                                        <td class="text-right">4306</td>
                                    </tr>
                                    <tr>
                                        <td>Firefox</td>
                                        <td class="text-right">3801</td>
                                    </tr>
                                    <tr>
                                        <td>IE</td>
                                        <td class="text-right">1689</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Real-Time</h5>
                    </div>
                    <div class="card-body px-4">
                        <div id="world_map" style="height:350px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Calendar</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="chart">
                                <div id="datetimepicker-dashboard"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                <div class="card flex-fill px-2">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Latest Projects</h5>
                    </div>
                    <table class="table table-hover my-0" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="d-none d-xl-table-cell">Start Date</th>
                                <th class="d-none d-xl-table-cell">End Date</th>
                                <th>Status</th>
                                <th class="d-none d-md-table-cell">Assignee</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Project Apollo</td>
                                <td class="d-none d-xl-table-cell">01/01/2020</td>
                                <td class="d-none d-xl-table-cell">31/06/2020</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                            </tr>
                            <tr>
                                <td>Project Fireball</td>
                                <td class="d-none d-xl-table-cell">01/01/2020</td>
                                <td class="d-none d-xl-table-cell">31/06/2020</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                                <td class="d-none d-md-table-cell">William Harris</td>
                            </tr>
                            <tr>
                                <td>Project Hades</td>
                                <td class="d-none d-xl-table-cell">01/01/2020</td>
                                <td class="d-none d-xl-table-cell">31/06/2020</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">Sharon Lessman</td>
                            </tr>
                            <tr>
                                <td>Project Nitro</td>
                                <td class="d-none d-xl-table-cell">01/01/2020</td>
                                <td class="d-none d-xl-table-cell">31/06/2020</td>
                                <td><span class="badge bg-warning">In progress</span></td>
                                <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                            </tr>
                            <tr>
                                <td>Project Phoenix</td>
                                <td class="d-none d-xl-table-cell">01/01/2020</td>
                                <td class="d-none d-xl-table-cell">31/06/2020</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">William Harris</td>
                            </tr>
                            <tr>
                                <td>Project X</td>
                                <td class="d-none d-xl-table-cell">01/01/2020</td>
                                <td class="d-none d-xl-table-cell">31/06/2020</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">Sharon Lessman</td>
                            </tr>
                            <tr>
                                <td>Project Romeo</td>
                                <td class="d-none d-xl-table-cell">01/01/2020</td>
                                <td class="d-none d-xl-table-cell">31/06/2020</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">Christina Mason</td>
                            </tr>
                            <tr>
                                <td>Project Wombat</td>
                                <td class="d-none d-xl-table-cell">01/01/2020</td>
                                <td class="d-none d-xl-table-cell">31/06/2020</td>
                                <td><span class="badge bg-warning">In progress</span></td>
                                <td class="d-none d-md-table-cell">William Harris</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Monthly Sales</h5>
                    </div>
                    <div class="card-body d-flex w-100">
                        <div class="align-self-center chart chart-lg">
                            <canvas id="chartjs-dashboard-bar"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="datatables/datatables.min.js"></script>
    <script>
        $(function() {
            $('#sampleTable').DataTable({
                processing: true,
                serverSide: false
            });
        });
    </script>
@endpush
