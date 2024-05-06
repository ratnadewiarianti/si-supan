<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#masterMenu" aria-expanded="false" aria-controls="masterMenu">
        <i class="ti-files menu-icon"></i>
        <span class="menu-title">Master</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="masterMenu">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item <?= (strpos($uri, '/user/') !== false) ? 'active' : '' ?>"> 
                <a class="nav-link" href="/user">User</a>
            </li>
            <li class="nav-item <?= (strpos($uri, '/karyawan/') !== false) ? 'active' : '' ?>"> 
                <a class="nav-link" href="/karyawan">Karyawan</a>
            </li>
            <li class="nav-item <?= (strpos($uri, '/rakbelanja/') !== false) ? 'active' : '' ?>"> 
                <a class="nav-link" href="#">Master Rekening</a>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item <?= (strpos($uri, '/akun/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/akun">Akun</a></li>
                       <li class="nav-item <?= (strpos($uri, '/kelompok/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/kelompok">Kelompok</a></li>
                       <li class="nav-item <?= (strpos($uri, '/jenis/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/jenis">Jenis</a></li>
                       <li class="nav-item <?= (strpos($uri, '/objek/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/objek">Objek</a></li>
                       <li class="nav-item <?= (strpos($uri, '/rincianobjek/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/rincianobjek">Rincian Objek</a></li>
                       <li class="nav-item <?= (strpos($uri, '/subrincian/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/subrincian">Sub Rincian Objek</a></li>
                </ul>
            </li>
            <li class="nav-item <?= (strpos($uri, '/dpa/') !== false) ? 'active' : '' ?>"> 
                <a class="nav-link" href="#">Master Subkegiatan</a>
                <ul class="nav flex-column sub-menu">
                <li class="nav-item <?= (strpos($uri, '/urusan/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/urusan">Urusan</a></li>
                       <li class="nav-item <?= (strpos($uri, '/bidang_urusan/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/bidang_urusan">Bidang Urusan</a></li>
                       <li class="nav-item <?= (strpos($uri, '/program/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/program">Program</a></li>
                       <li class="nav-item <?= (strpos($uri, '/kegiatan/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/kegiatan">Kegiatan</a></li>
                       <li class="nav-item <?= (strpos($uri, '/subkegiatan/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/subkegiatan">Subkegiatan</a></li>
                </ul>
            </li>
        </ul>
    </div>
</li>
