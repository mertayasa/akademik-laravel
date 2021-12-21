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
            <li class="sidebar-item {{ isActive('user') }}">
                <a class="sidebar-link" href="{{ route('user.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data User</span>
                </a>
            </li>

            <li class="sidebar-item {{ isActive('guru') }}">
                <a class="sidebar-link" href="{{ route('guru.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Guru</span>
                </a>
            </li>

             <li class="sidebar-item {{ isActive('ortu') }}">
                <a class="sidebar-link" href="{{ route('ortu.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Orang Tua</span>
                </a>
            </li>

            <li class="sidebar-item {{ isActive('siswa') }}">
                <a class="sidebar-link" href="{{ route('siswa.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Siswa </span>
                </a>
            </li>

            <li class="sidebar-item {{ isActive('pengumuman') }}">
                <a class="sidebar-link" href="{{ route('pengumuman.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Pengumuman</span>
                </a>
            </li>

            <li class="sidebar-item {{ isActive('kelas') }}">
                <a class="sidebar-link" href="{{ route('kelas.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Kelas</span>
                </a>
            </li>

            <li class="sidebar-item {{ isActive('mapel') }}">
                <a class="sidebar-link" href="{{ route('mapel.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Mata Pelajaran</span>
                </a>
            </li>

            <li class="sidebar-item {{ isActive('ekskul') }}">
                <a class="sidebar-link" href="{{ route('ekskul.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Ekstrakulikuler</span>
                </a>
            </li>

            <li class="sidebar-header">
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
            </li>
        </ul>


    </div>
</nav>
