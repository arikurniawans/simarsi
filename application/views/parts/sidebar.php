<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="<?php echo base_url(); ?>assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?php echo $this->session->userdata('nama'); ?></div><small><?php echo ucwords($this->session->userdata('user_status')); ?></small></div>
                </div>

                <ul class="side-menu metismenu">

                <!-- Akses menu user -->

                    <li>
                        <a class="active" href="<?php echo base_url(); ?>dashboard"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                
                    <?php $resrole = $this->db->get_where('role_management',array(
                        'nrp' => $this->session->userdata('nrp')
                    ))->result();

                    foreach($resrole as $data){ ?>
                    
                    <?php if($data->menus == "suratmasuk" AND $data->role == "T"){ ?>
                    <li class="heading">DATA SURAT</li>
                    <li>
                        <a href="<?php echo base_url(); ?>suratmasuk"><i class="sidebar-item-icon fa fa-envelope"></i>
                            <span class="nav-label">Surat Masuk</span>
                        </a>
                    </li>
                    <?php }else if($data->menus == "suratkeluar" AND $data->role == "T"){ ?>
                    <li>
                        <a href="<?php echo base_url(); ?>suratkeluar"><i class="sidebar-item-icon fa fa-envelope-o"></i>
                            <span class="nav-label">Surat Keluar</span>
                        </a>
                    </li>
                    <?php }else if($data->menus == "laporansuratmasuk" AND $data->role == "T"){ ?>
                    <li class="heading">LAPORAN</li>
                    <li>
                        <a href="<?php echo base_url(); ?>laporan/laporansuratmasuk"><i class="sidebar-item-icon fa fa-print"></i>
                            <span class="nav-label">Surat Masuk</span>
                        </a>
                    </li>
                    <?php }else if($data->menus == "laporansuratkeluar" AND $data->role == "T"){ ?>
                    <li>
                        <a href="<?php echo base_url(); ?>laporan/laporansuratkeluar"><i class="sidebar-item-icon fa fa-print"></i>
                            <span class="nav-label">Surat Keluar</span>
                        </a>
                    </li>
                    <?php } } ?>

                    <!-- Akses menu Superadmin -->

                    <?php if($this->session->userdata('user_status') == "admin"){ ?>
                    <li class="heading">DATA SURAT</li>
                    <li>
                        <a href="<?php echo base_url(); ?>suratmasuk"><i class="sidebar-item-icon fa fa-envelope"></i>
                            <span class="nav-label">Surat Masuk</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>suratkeluar"><i class="sidebar-item-icon fa fa-envelope-o"></i>
                            <span class="nav-label">Surat Keluar</span>
                        </a>
                    </li>
                    <li class="heading">LAPORAN</li>
                    <li>
                        <a href="<?php echo base_url(); ?>laporan/laporansuratmasuk"><i class="sidebar-item-icon fa fa-print"></i>
                            <span class="nav-label">Surat Masuk</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>laporan/laporansuratkeluar"><i class="sidebar-item-icon fa fa-print"></i>
                            <span class="nav-label">Surat Keluar</span>
                        </a>
                    </li>
                    <li class="heading">PENGATURAN</li>
                    <li>
                        <a href="<?php echo base_url(); ?>jenissurat"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Jenis Surat</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>indeksberkas"><i class="sidebar-item-icon fa fa-sitemap"></i>
                            <span class="nav-label">Indeks Berkas</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>pengguna"><i class="sidebar-item-icon fa fa-users"></i>
                            <span class="nav-label">Pengguna</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->