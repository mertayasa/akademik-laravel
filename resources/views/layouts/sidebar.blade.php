<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">AdminKit</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ isActive('dashboard') }}">
                <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            @if (roleName() == 'admin')
                <li class="sidebar-item {{ isActive('akademik') }}">
                    <a class="sidebar-link" href="{{ route('akademik.index') }}">
                        <i class="fas fa-book-reader"></i> <span class="align-middle pl-1">Akademik</span>
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
            @endif

            @if (roleName() != 'ortu')
                <li class="sidebar-item {{ isActive('pengumuman') }}">
                    <a class="sidebar-link" href="{{ route('pengumuman.index') }}">
                        <i class="fas fa-bullhorn"></i><span class="align-middle pl-1">Pengumuman</span>
                    </a>
                </li>
            @endif


            @if (roleName() != 'admin')
                <li class="sidebar-item {{ isActive('jadwal') }}">
                    <a class="sidebar-link" href="{{ route('jadwal.index') }}">
                        <i class="fas fa-calendar-alt"></i> <span class="align-middle pl-1">Data Jadwal</span>
                    </a>
                </li>
            @endif

            <li class="sidebar-item {{ isActive('prestasi') }}">
                <a class="sidebar-link" href="{{ route('prestasi.index') }}">
                    <i class="fas fa-trophy"></i> <span class="align-middle pl-1">Data Prestasi</span>
                </a>
            </li>
            @if (roleName() == 'ortu')
                <li class="sidebar-item {{ isActive('nilai') }}">
                    <a class="sidebar-link" href="{{ route('nilai.index') }}">
                        <i class="fas fa-list-ol"></i> <span class="align-middle pl-1">Data Nilai</span>
                    </a>
                </li>
            @endif
            @if (roleName() == 'guru')
                <li class="sidebar-item {{ isActive('siswa') }}">
                    <a class="sidebar-link" href="{{ route('siswa.index') }}">
                        <i class="fas fa-user-graduate" class="align-middle"></i> <span
                            class="align-middle  pl-1">Data
                            Siswa </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a data-target="#nilai" data-toggle="collapse" class="sidebar-link collapsed">
                        <i class="fas fa-list-ol"></i> <span class="align-middle pl-1">Data Nilai</span>
                    </a>
                    <ul id="nilai" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                        <li class="sidebar-item {{ isActive('nilai') }}">
                            <a class="sidebar-link" href="{{ route('nilai.index') }}">
                                <span class="align-middle pl-1">Data Nilai</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ isActive('nilai_ekskul') }}">
                            <a class="sidebar-link" href="{{ route('nilai_ekskul.index') }}">
                                <span class="align-middle">Data Nilai Ekskul</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ isActive('nilai_sikap') }}">
                            <a class="sidebar-link" href="{{ route('nilai_sikap.index') }}">
                                <span class="align-middle">Data Nilai Sikap</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ isActive('nilai_kesehatan') }}">
                            <a class="sidebar-link" href="{{ route('nilai_kesehatan.index') }}">
                                <span class="align-middle">Data Nilai Kesehatan</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ isActive('nilai_proporsi') }}">
                            <a class="sidebar-link" href="{{ route('nilai_proporsi.index') }}">
                                <span class="align-middle">Data Nilai Proporsi</span>
                            </a>
                        </li>
                    </ul>
                </li>
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
