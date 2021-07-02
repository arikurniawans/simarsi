<div class="content-wrapper">
            <div class="page-heading">
                <h1 class="page-title">Indeks Berkas</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-gear"></i> Pengaturan Indeks Berkas</li>
                </ol>
            </div>
            <a href="javascript:void(0);" class="btn btn-info float-sm-right" data-toggle="modal" data-target="#modal-lg">
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data
            </a><br/>
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Tabel Indeks Berkas</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr style="background-color: #374f65; color: white;">
                                    <th width="2%">#</th>
                                    <th>Kode Indeks Berkas</th>
                                    <th>Keterangan</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($indeks as $data){ ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data->kode_indeks; ?></td>
                                    <td><?php echo $data->keterangan; ?></td>
                                    <td>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#editindeks<?php echo $data->id_indeks; ?>" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#hapusindeks<?php echo $data->id_indeks; ?>" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editindeks<?php echo $data->id_indeks; ?>">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <form action="<?php echo base_url(); ?>indeksberkas/edit" method="post">
                                        <div class="modal-header" style="background-color: #374f65; color: white;">
                                        <h4 class="modal-title">Ubah Data Indeks Berkas</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Kode Indeks Berkas</label>
                                                <input type="hidden" name="id" value="<?php echo $data->id_indeks; ?>">
                                                <input type="text" class="form-control" id="exampleInputEmail1" required name="kode" value="<?php echo $data->kode_indeks; ?>" placeholder="Ketikan kode indeks berkas">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Keterangan</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" required name="keterangan" value="<?php echo $data->keterangan; ?>" placeholder="Ketikan keterangan indeks berkas">
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

                                <div class="modal fade" id="hapusindeks<?php echo $data->id_indeks; ?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <form action="<?php echo base_url(); ?>indeksberkas/delete" method="post">
                                        <div class="modal-header" style="background-color: #e74c3c; color: white;">
                                        <h4 class="modal-title">Hapus Data Indeks Berkas</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?php echo $data->id_indeks; ?>">
                                            Apakah anda yakin akan menghapus data indeks berkas berikut ?
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
          <form action="<?php echo base_url(); ?>indeksberkas/create" method="post">
            <div class="modal-header" style="background-color: #374f65; color: white;">
              <h4 class="modal-title">Tambah Data Indeks Berkas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Indeks Berkas</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" required name="kode" placeholder="Ketikan kode indeks berkas">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" required name="keterangan" placeholder="Ketikan keterangan indeks berkas">
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
    swal("Berhasil","Data indeks berkas berhasil ditambahkan","success");
<?php }else if($this->session->flashdata('message') == 'error') { ?>
    swal("Berhasil","Data indeks berkas gagal ditambahkan","error");
<?php } ?>

<?php if($this->session->flashdata('message2') == 'successfull') { ?>
    swal("Berhasil","Data indeks berkas berhasil diubah","success");
<?php }else if($this->session->flashdata('message2') == 'error') { ?>
    swal("Berhasil","Data indeks berkas gagal diubah","error");
<?php } ?>

<?php if($this->session->flashdata('message3') == 'successfull') { ?>
    swal("Berhasil","Data indeks berkas berhasil dihapus","success");
<?php }else if($this->session->flashdata('message3') == 'error') { ?>
    swal("Berhasil","Data indeks berkas gagal dihapus","error");
<?php } ?>
</script>