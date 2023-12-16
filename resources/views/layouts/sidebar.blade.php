<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">Persewaan Mobil</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">PM</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Dashboard</li>

            @if (auth()->user()->role == 'admin')
                <li class="nav-item dropdown {{ $title == 'Dashboard' ? 'active' : '' }}">
                    <a href="/admin" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                </li>

                <li class="menu-header">Data</li>

                <li class="nav-item dropdown {{ $title === 'mobil' ? 'active' : '' }}">
                    <a href="/admin/mobil" class="nav-link"><i class="fas fa-car"></i><span>Mobil</span></a>
                </li>

                <li class="menu-header">Transaksi</li>

                <li class="nav-item dropdown {{ $title === 'peminjaman' ? 'active' : '' }}">
                    <a href="/admin/peminjaman" class="nav-link"><i class="fas fa-redo"></i><span>Peminjaman</span></a>
                </li>

                <li class="nav-item dropdown {{ $title == 'pengembalian' ? 'active' : '' }}">
                    <a href="/admin/pengembalian" class="nav-link"><i
                            class="fas fa-undo"></i><span>pengembalian</span></a>
                </li>
            @else
                <li class="nav-item dropdown {{ $title == 'Dashboard' ? 'active' : '' }}">
                    <a href="/user" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
                </li>

                <li class="menu-header">Transaksi</li>

                <li class="nav-item dropdown {{ $title === 'peminjaman' ? 'active' : '' }}">
                    <a href="/user/peminjaman" class="nav-link"><i class="fas fa-redo"></i><span>Riwayat
                            Peminjaman</span></a>
                </li>

                <li class="nav-item dropdown {{ $title == 'pengembalian' ? 'active' : '' }}">
                    <a href="/user/pengembalian" class="nav-link"><i class="fas fa-undo"></i><span>Riwayat
                            pengembalian</span></a>
                </li>
            @endif

        </ul>

    </aside>
</div>
