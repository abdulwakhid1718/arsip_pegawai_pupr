<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? '' : 'collapsed' }}" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @can('admin')
            <li class="nav-heading">Administrator</li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('pegawai*') ? '' : 'collapsed' }}" href="/pegawai">
                    <i class="bi bi-people "></i>
                    <span>Data Pegawai</span>
                </a>
            </li><!-- End Profile Page Nav -->
        @endcan

        @can('kasubag')
            <li class="nav-heading">Administrator</li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('pegawai*') ? '' : 'collapsed' }}" href="/pegawai">
                    <i class="bi bi-people "></i>
                    <span>Data Pegawai</span>
                </a>
            </li><!-- End Profile Page Nav -->
        @endcan

        <li class="nav-heading">User Pages</li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('berkas*') ? '' : 'collapsed' }}" href="/berkas">
                <i class="bi bi-archive "></i>
                <span>Arsip Berkas</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('profile*') ? '' : 'collapsed' }}" href="/profile">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
