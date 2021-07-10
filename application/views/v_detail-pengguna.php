<div class="content-wrapper">
            <div class="page-heading">
                <h1 class="page-title">Pengguna</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-gear"></i> Pengaturan Role Management Pengguna</li>
                </ol>
            </div>
            <a href="<?php echo base_url(); ?>pengguna" class="btn btn-default float-sm-right">
                    <i class="fa fa-step-backward" aria-hidden="true"></i> Kembali
            </a><br/>
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Detail Data Pengguna</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <td width="20%"><b>NRP</b></td>
                                <td width="2%">:</td>
                                <td><?php echo $nrp; ?></td>
                            </tr>
                            <tr>
                                <td width="20%"><b>Nama Personel</b></td>
                                <td width="2%">:</td>
                                <td><?php echo strtoupper($nama); ?></td>
                            </tr>
                            <tr>
                                <td width="20%"><b>Pangkat / Jabatan</b></td>
                                <td width="2%">:</td>
                                <td><?php echo strtoupper($pangkat); ?> - <?php echo strtoupper($jabatan); ?></td>
                            </tr>
                            <tr>
                                <td width="20%"><b>No. Telepon</b></td>
                                <td width="2%">:</td>
                                <td><?php echo $no_telpon; ?></td>
                            </tr>
                            <tr>
                                <td width="20%"><b>Otoritas Pengguna</b></td>
                                <td width="2%">:</td>
                                <td><?php echo ucwords($otoritas); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <form method="post" action="<?php echo base_url(); ?>pengguna/editrole">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Tabel Role Management</div>
                    </div>
                    <div class="ibox-body">
                            <table class="table table-bordered table-bordered">
                                <thead>
                                <tr style="background-color: #374f65; color: white;">
                                    <th width="2%">#</th>
                                    <th width="30%">Menu</th>
                                    <th width="10%" style="text-align: center">Akses Menu</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; foreach($role as $a){ ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php if($a->menus == 'dashboard'){ echo "Dashboard"; }else if($a->menus == 'suratmasuk'){ echo "Surat Masuk"; }else if($a->menus == 'suratkeluar'){ echo "Surat Keluar"; }else if($a->menus == 'laporansuratmasuk'){ echo "Laporan Surat Masuk"; }else if($a->menus == 'laporansuratkeluar'){ echo "Laporan Surat Keluar"; } ?></td>
                                    <td>
                                        <center>
                                                <?php if($a->role == 'T'){ ?>
                                                    <a href="javascript:void(0);" class="badge badge-success" data-toggle="modal" data-target="#editrole<?php echo $a->id_role; ?>">Enable</a>
                                                <?php }else if($a->role == 'F'){ ?>
                                                    <a href="javascript:void(0);" class="badge badge-default" data-toggle="modal" data-target="#editrole<?php echo $a->id_role; ?>">Disable</a>
                                                <?php } ?>
                                        </center>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editrole<?php echo $a->id_role; ?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <form action="<?php echo base_url(); ?>pengguna/editrole" method="post">
                                        <div class="modal-header" style="background-color: #374f65; color: white;">
                                        <h4 class="modal-title">Role Management</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?php echo $a->id_role; ?>">
                                            <input type="hidden" name="role" value="<?php echo $a->role; ?>">
                                            <input type="hidden" name="id_personel" value="<?php echo $id_personel; ?>">
                                            Apakah anda yakin akan memberikan akses menu berikut kepada pengguna
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-flat btn-primary">Atur Akses</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                    </form>
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <?php } ?>
                                </tbody>
                            </table>
                    </div>
                </div>
                </form>
                
            </div>

<!-- END PAGE CONTENT-->

<script type='text/javascript'>
<?php if($this->session->flashdata('message') == 'successfull') { ?>
    swal("Berhasil","Akses menu berhasil di setting","success");
<?php }else if($this->session->flashdata('message') == 'error') { ?>
    swal("Berhasil","Akses menu gagal di setting","error");
<?php } ?>
</script>