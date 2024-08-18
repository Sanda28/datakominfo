<!-- Sidebar -->
<ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">
 <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon ">
                    <i class="fa fa-wifi text-dark-900"></i>
                </div>
                <div class="sidebar-brand-text mx-3 text-body-900">InfraTek</div>
            </a>
 <!-- Divider -->
            <hr class="sidebar-divider">
 
 <!-- Looping Menu-->
            <li class="nav-item active">
                <a class="nav-link " href="<?= base_url('admin'); ?>">
                <i class="fa fa-home" aria-hidden="true"></i>
                    <span>DashBoard</span>
                </a>
            </li>  
            
            <hr class="sidebar-divider">
            
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    <span> Tabel Master</span>
                </a>
                <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"> Tabel Master :</h6>
                        <a class="collapse-item" href="<?= base_url('menara'); ?>">Menara BTS</a>
                        <a class="collapse-item" href="<?= base_url('wifi'); ?>">Wifi</a>
                        <a class="collapse-item" href="<?= base_url('akun'); ?>">Akun</a>
                    </div>
                </div>
            </li> 
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    <span>Permohonan</span>
                </a>
                <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"> Permohonan Izin Menara :</h6>
                        <a class="collapse-item" href="<?= base_url('permohonan/menarabaru'); ?>">Menara Baru</a>
                        <a class="collapse-item" href="<?= base_url('permohonan/menaraeksisting'); ?>">Menara Eksisting</a>
                        
                    </div>
                </div>
            </li>     
            <li class="nav-item active">
                <a class="nav-link " href="<?= base_url('maps'); ?>">
                <i class="fas fa-map fa-sm fa-fw mr-2"></i>
                    <span>Maps</span>
                </a>
            </li>     
            <li class="nav-item active">
                <a class="nav-link " href="<?= base_url('surat'); ?>">
                <i class="fas fa-map fa-sm fa-fw mr-2"></i>
                    <span>Surat</span>
                </a>
            </li>   
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-id-card" aria-hidden="true"></i>
                    <span>Profil</span>
                </a>
                <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Profil :</h6>
                        <a class="collapse-item" href="<?= base_url('admin/profil'); ?>">Profil</a>
                        <a class="collapse-item" href="<?= base_url('admin/ubahpassword'); ?>">Ganti Password</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link " href="<?= base_url('autentifikasi/logout'); ?>">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                    <span>Logout</span>
                </a>
            </li> 
           
            <!-- Divider -->
            <hr class="sidebar-divider mt-3">
        <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
 <!-- End of Sidebar -- > 
    
               