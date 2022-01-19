<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar justify-content-center">
        <div class="pt-4 pb-3">
            <center>
                <img class="img-fluid" src="{{ asset('admin/img/logo.png') }}" alt="Responsive image" width="100"
                    height="100">
            </center>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>

            <li class="sidebar-item {{ isActive('dashboard') }}">
                <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            @if (Auth::user()->isWali())
                <li class="sidebar-item {{ isActive('akademik') }}">
                    <a class="sidebar-link" href="{{ route('akademik.index') }}">
                        <i class="fas fa-book-reader"></i> <span class="align-middle pl-1">Akademik</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->isGuru())
                <li class="sidebar-item {{ isActive('jadwal') }}">
                    <a class="sidebar-link" href="{{ route('jadwal.index.guru') }}">
                        <i class="fas fa-chalkboard-teacher"></i> <span class="align-middle">Jadwal</span>
                    </a>
                </li>
                <li class="sidebar-item {{ isActive('nilai') }}">
                    <a class="sidebar-link" href="{{ route('nilai.index.guru') }}">
                        <i class="fas fa-star"></i> <span class="align-middle">Nilai</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->isAdmin())
                <li class="sidebar-item {{ isActive('akademik') }}">
                    <a class="sidebar-link" href="{{ route('akademik.index') }}">
                        <i class="fas fa-book-reader"></i> <span class="align-middle">Akademik</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a data-target="#ui" data-toggle="collapse" class="sidebar-link collapsed">
                        <i class="fas fa-users"></i> <span class="align-middle"> Data User</span>
                    </a>
                    <ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                        <li class="sidebar-item {{ isActive('guru') }}">
                            <a class="sidebar-link" href="{{ route('guru.index') }}"> <span
                                    class="align-middle">Data
                                    Guru</span></a>
                        </li>

                        <li class="sidebar-item {{ isActive('ortu') }}">
                            <a class="sidebar-link" href="{{ route('ortu.index') }}"> <span
                                    class="align-middle">Data
                                    Orang Tua</span> </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ isActive('siswa') }}">
                    <a class="sidebar-link" href="{{ route('siswa.index') }}">
                        <i class="fas fa-user-graduate" class="align-middle"></i> <span
                            class="align-middle  pl-1">Data
                            Siswa </span>
                    </a>
                </li>

                <li class="sidebar-item {{ isActive('kelas') }}">
                    <a class="sidebar-link" href="{{ route('kelas.index') }}">
                        <i class="fas fa-grip-horizontal"></i> <span class="align-middle pl-1">Data Kelas</span>
                    </a>
                </li>

                <li class="sidebar-item {{ isActive('prestasi') }}">
                    <a class="sidebar-link" href="{{ route('prestasi.index') }}">
                        <i class="fas fa-trophy"></i> <span class="align-middle pl-1">Data Prestasi</span>
                    </a>
                </li>

                <li class="sidebar-item {{ isActive('mapel') }}">
                    <a class="sidebar-link" href="{{ route('mapel.index') }}">
                        <i class="fas fa-book-open"></i> <span class="align-middle pl-1">Data Mata Pelajaran</span>
                    </a>
                </li>

                <li class="sidebar-item {{ isActive('ekskul') }}">
                    <a class="sidebar-link" href="{{ route('ekskul.index') }}">
                        <i class="fas fa-filter"></i> <span class="align-middle pl-1">Data Ekstrakulikuler</span>
                    </a>
                </li>

                <li class="sidebar-item {{ isActive('wali_kelas') }}">
                    <a class="sidebar-link" href="{{ route('wali_kelas.index') }}">
                        <i class="fas fa-chalkboard-teacher"></i> <span class="align-middle pl-1">Data Wali Kelas</span>
                    </a>
                </li>

                <li class="sidebar-item {{ isActive('tahun_ajar') }}">
                    <a class="sidebar-link" href="{{ route('tahun_ajar.index') }}">
                        <i class="fas fa-book"></i> <span class="align-middle pl-1">Data Tahun Ajaran</span>
                    </a>
                </li>

                <li class="sidebar-item {{ isActive('pengumuman') }}">
                    <a class="sidebar-link" href="{{ route('pengumuman.index') }}">
                        <i class="fas fa-bullhorn"></i> <span class="align-middle pl-1">Data Pengumuman</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->isOrtu())
                <li class="sidebar-item {{ isActive('siswa') }}">
                    <a class="sidebar-link" href="{{ route('siswa.index_ortu') }}">
                        <i class="fas fa-user-graduate" class="align-middle"></i> <span
                            class="align-middle pl-1">Biodata Anak</span>
                    </a>
                </li>
                <li class="sidebar-item {{ isActive('jadwal') }}">
                    <a class="sidebar-link" href="{{ route('jadwal.index.ortu') }}">
                        <i class="fas fa-calendar-week"></i> <span class="align-middle pl-1">Jadwal</span>
                    </a>
                </li>
                <li class="sidebar-item {{ isActive('nilai') }}">
                    <a class="sidebar-link" href="{{ route('nilai.index.ortu') }}">
                        <i class="fas fa-star"></i> <span class="align-middle pl-1">Nilai</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item {{ isActive('history-nilai') }}">
                    <a class="sidebar-link" href="{{ route('history_nilai.index') }}">
                        <i class="fas fa-chart-line"></i> <span class="align-middle pl-1">Histori Nilai</span>
                    </a>
                </li> --}}
            @endif


            {{-- <li class="sidebar-header">
                Multi Level
            </li>
            <li class="sidebar-item">
                <a data-target="#ui" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Level 1</span>
                </a>
                <ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Level 2</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.html">Level 2</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Level 2</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-general.html">Level 2</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-grid.html">Level 2</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-modals.html">Level 2</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-typography.html">Level 2</a></li>
                </ul>
            </li> --}}
        </ul>


    </div>
</nav>
