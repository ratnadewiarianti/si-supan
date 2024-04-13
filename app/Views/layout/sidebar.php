   <?php
    $uri = $_SERVER['REQUEST_URI'];
    ?>

   <nav class="sidebar sidebar-offcanvas" id="sidebar">
       <ul class="nav">
           <li class="nav-item <?= (strpos($uri, '/home') !== false || $uri == '/') ? 'active' : '' ?>">
               <a class="nav-link" href="/">
                   <i class="ti-layers menu-icon"></i>
                   <span class="menu-title">Dashboard</span>
               </a>
           </li>
           <li class="nav-item  <?= (strpos($uri, '/starter') !== false) ? 'active' : '' ?>">
               <a class="nav-link" href="starter">
                   <i class="ti-write menu-icon"></i>
                   <span class="menu-title">Starter</span>
               </a>
           </li>
           <li class="nav-item  ">
               <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                   <i class="ti-files menu-icon"></i>
                   <span class="menu-title">Master</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="ui-basic">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item <?= (strpos($uri, '/user/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/user">User</a></li>
                       <li class="nav-item <?= (strpos($uri, '/karyawan/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/karyawan">Karyawan</a></li>
                       <li class="nav-item <?= (strpos($uri, '/datarekening/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/datarekening">Rekening</a></li>
                       <li class="nav-item <?= (strpos($uri, '/rakbelanja/') !== false) ? 'active' : '' ?>"> <a class="nav-link" href="/rakbelanja">Rak Belanja</a></li>
                   </ul>
               </div>
           </li>
       </ul>
   </nav>