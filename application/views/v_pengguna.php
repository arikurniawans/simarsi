<div class="content-wrapper">
            <div class="page-heading">
                <h1 class="page-title">Pengguna</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-gear"></i> Pengaturan Pengguna</li>
                </ol>
            </div>
            <a href="javascript:void(0);" class="btn btn-info float-sm-right" data-toggle="modal" data-target="#modal-lg">
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data
            </a><br/>
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Tabel Pengguna</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr style="background-color: #374f65; color: white;">
                                    <th width="2%">#</th>
                                    <th>Nama Pengguna</th>
                                    <th>NRP</th>
                                    <th>Pangkat</th>
                                    <th>Jabatan</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($pengguna as $data){ ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo ucwords($data->nama); ?></td>
                                    <td><?php echo $data->nrp; ?></td>
                                    <td><?php echo $data->pangkat; ?></td>
                                    <td><?php echo $data->jabatan; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>pengguna/show/<?php echo $data->id_personel; ?>" class="btn btn-info btn-xs">Detail</a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#editpengguna<?php echo $data->id_personel; ?>" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#hapuspengguna<?php echo $data->id_personel; ?>" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editpengguna<?php echo $data->id_personel; ?>">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <form action="<?php echo base_url(); ?>pengguna/edit" method="post">
                                        <div class="modal-header" style="background-color: #374f65; color: white;">
                                        <h4 class="modal-title">Ubah Data Pengguna</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                                <input type="hidden" name="id" value="<?php echo $data->id_personel; ?>"/>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama" value="<?php echo $data->nama; ?>" placeholder="Ketikan nama lengkap">
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Pangkat</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="pangkat" value="<?php echo $data->pangkat; ?>" placeholder="Ketikan Jenis Pangkat">
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">NRP</label> *) <font color ="red" style="font-size: 10pt;">NRP digunakan sebagai password default oleh sistem</font>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="nrp" value="<?php echo $data->nrp; ?>" placeholder="Ketikan NRP">
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Jabatan</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="jabatan" value="<?php echo $data->jabatan; ?>" placeholder="Ketikan jabatan">
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Otoritas Pengguna</label>
                                                <div class="col-sm-6">
                                                    <input type="radio" name="otoritas" class="radio-inline" value="pimpinan" <?php if($data->user_status == 'pimpinan') echo 'checked'; ?> > Pimpinan &nbsp;&nbsp;
                                                    <input type="radio" name="otoritas" class="radio-inline" value="personel" <?php if($data->user_status == 'personel') echo 'checked'; ?>> Personel
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">No. Telepon</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="telp" value="<?php echo $data->no_telpon; ?>" placeholder="Ketikan no. telepon">
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Username</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="username" value="<?php echo $data->username; ?>" placeholder="Ketikan username">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-flat btn-primary">Simpan Perubahan Data</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                    </form>
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <div class="modal fade" id="hapuspengguna<?php echo $data->id_personel; ?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <form action="<?php echo base_url(); ?>pengguna/delete" method="post">
                                        <div class="modal-header" style="background-color: #e74c3c; color: white;">
                                        <h4 class="modal-title">Hapus Data Pengguna</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?php echo $data->id_personel; ?>">
                                            Apakah anda yakin akan menghapus data pengguna berikut ?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-flat btn-danger">Hapus Data</button>
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
</div>
<!-- END PAGE CONTENT-->


<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <form action="<?php echo base_url(); ?>pengguna/create" method="post">
            <div class="modal-header" style="background-color: #374f65; color: white;">
              <h4 class="modal-title">Tambah Data Pengguna</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" placeholder="Ketikan nama lengkap">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pangkat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="pangkat" placeholder="Ketikan Jenis Pangkat">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NRP</label> *) <font color ="red" style="font-size: 10pt;">NRP digunakan sebagai password default oleh sistem</font>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nrp" placeholder="Ketikan NRP">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="jabatan" placeholder="Ketikan jabatan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Otoritas Pengguna</label>
                    <div class="col-sm-6">
                        <input type="radio" name="otoritas" class="radio-inline" value="pimpinan"> Pimpinan &nbsp;&nbsp;
                        <input type="radio" name="otoritas" class="radio-inline" value="personel"> Personel
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No. Telepon</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="telp" placeholder="Ketikan no. telepon">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Ketikan username">
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-flat btn-info">Simpan Data</button>
            </div>
          </div>
          <!-- /.modal-content -->
          </form>
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


<script type='text/javascript'>
<?php if($this->session->flashdata('message') == 'successfull') { ?>
    swal("Berhasil","Data pengguna berhasil ditambahkan","success");
<?php }else if($this->session->flashdata('message') == 'error') { ?>
    swal("Berhasil","Data pengguna gagal ditambahkan","error");
<?php } ?>

<?php if($this->session->flashdata('message2') == 'successfull') { ?>
    swal("Berhasil","Data pengguna berhasil diubah","success");
<?php }else if($this->session->flashdata('message2') == 'error') { ?>
    swal("Berhasil","Data pengguna gagal diubah","error");
<?php } ?>

<?php if($this->session->flashdata('message3') == 'successfull') { ?>
    swal("Berhasil","Data pengguna berhasil dihapus","success");
<?php }else if($this->session->flashdata('message3') == 'error') { ?>
    swal("Berhasil","Data pengguna gagal dihapus","error");
<?php } ?>
</script>