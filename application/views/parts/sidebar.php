<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="./assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?php echo $this->session->userdata('nama'); ?></div><small><?php echo ucwords($this->session->userdata('user_status')); ?></small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="index.html"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li class="heading">DATA SURAT</li>
                    <li>
                        <a href="icons.html"><i class="sidebar-item-icon fa fa-envelope"></i>
                            <span class="nav-label">Surat Masuk</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons.html"><i class="sidebar-item-icon fa fa-envelope-o"></i>
                            <span class="nav-label">Surat Keluar</span>
                        </a>
                    </li>
                    <li class="heading">LAPORAN</li>
                    <li>
                        <a href="icons.html"><i class="sidebar-item-icon fa fa-print"></i>
                            <span class="nav-label">Surat Masuk</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons.html"><i class="sidebar-item-icon fa fa-print"></i>
                            <span class="nav-label">Surat Keluar</span>
                        </a>
                    </li>
                    <li class="heading">PENGATURAN</li>
                    <li>
                        <a href="icons.html"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Jenis Surat</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons.html"><i class="sidebar-item-icon fa fa-sitemap"></i>
                            <span class="nav-label">Indeks Berkas</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons.html"><i class="sidebar-item-icon fa fa-users"></i>
                            <span class="nav-label">Pengguna</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->