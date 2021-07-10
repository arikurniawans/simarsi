<div class="content-wrapper">
            <div class="page-heading">
                <h1 class="page-title">Surat Masuk</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-envelope"></i> Data Surat Masuk</li>
                </ol>
            </div>
            <a href="javascript:void(0);" class="btn btn-info float-sm-right" data-toggle="modal" data-target="#modal-lg">
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data
            </a><br/>
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Tabel Surat Masuk</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr style="background-color: #374f65; color: white;">
                                    <th width="2%">#</th>
                                    <?php if($this->session->userdata('user_status') == "admin"){ ?>
                                    <th width="15%">Pemilik Arsip</th>
                                    <?php } ?>
                                    <th width="15%">Nomor Surat</th>
                                    <th>Asal Surat</th>
                                    <th width="15%">Tanggal Surat</th>
                                    <th>Perihal</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($surat as $data){ ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <?php if($this->session->userdata('user_status') == "admin"){ ?>
                                    <td><?php echo $data->nama; ?></td>
                                    <?php } ?>
                                    <td><?php echo $data->nomor_surat; ?></td>
                                    <td><?php echo $data->asal_surat; ?></td>
                                    <td><?php echo $data->tgl_surat; ?></td>
                                    <td><?php echo $data->perihal; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>suratmasuk/show/<?php echo $data->id_surat; ?>" class="btn btn-info btn-xs">Detail</a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#editsurat<?php echo $data->id_surat; ?>" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#hapussurat<?php echo $data->id_surat; ?>" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="hapussurat<?php echo $data->id_surat; ?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <form action="<?php echo base_url(); ?>suratmasuk/delete" method="post">
                                        <div class="modal-header" style="background-color: #e74c3c; color: white;">
                                        <h4 class="modal-title">Hapus Data Surat Masuk</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?php echo $data->id_surat; ?>">
                                            Apakah anda yakin akan menghapus data surat masuk berikut ?
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

                                <div class="modal fade" id="editsurat<?php echo $data->id_surat; ?>">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <form action="<?php echo base_url(); ?>suratmasuk/edit" method="post" enctype="multipart/form-data">
                                        <div class="modal-header" style="background-color: #374f65; color: white;">
                                        <h4 class="modal-title">Ubah Data Surat Masuk</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="id" value="<?php echo $data->id_surat; ?>">
                                                <div class="form-group">
                                                <label class="form-control-label">Jenis Surat</label><br/>
                                                    <select class="form-control select2_demo_1" name="jenis_surat">
                                                            <option value="<?php echo $data->id_jenis; ?>" selected><?php echo $data->jenis; ?></option>
                                                            <?php foreach($jenissurat as $datajenis){ ?>
                                                                    <option value="<?php echo $datajenis->id_jenis; ?>"><?php echo ucwords($datajenis->jenis); ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                <label class="form-control-label">Indeks Berkas</label><br/>
                                                    <select class="form-control select2_demo_1" name="indeks_berkas">
                                                            <option value="<?php echo $data->id_indeks; ?>" selected><?php echo $data->kode_indeks; ?></option>
                                                            <?php foreach($indeks as $dataindeks){ ?>
                                                                    <option value="<?php echo $dataindeks->id_indeks; ?>"><?php echo strtoupper($dataindeks->kode_indeks); ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                <label class="form-control-label">Tanggal Surat Masuk</label><br/>
                                                    <input class="form-control" type="text" id="date_2" name="tgl_surat_masuk" value="<?php echo $data->tgl_surat; ?>" required placeholder="Ketikan tanggal surat masuk">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Perihal Surat</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" required name="perihal" value="<?php echo $data->perihal; ?>" placeholder="Ketikan perihal surat">
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nomor Surat</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" required name="nomor_surat" value="<?php echo $data->nomor_surat; ?>" placeholder="Ketikan nomor surat">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Asal Surat</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" required name="asal_surat" value="<?php echo $data->asal_surat; ?>" placeholder="Ketikan asal surat">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tujuan Surat</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" required name="tujuan_surat" value="<?php echo $data->tujuan_surat; ?>" placeholder="Ketikan tujuan surat">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">File Surat</label>
                                                    <input type="file" class="form-control" id="exampleInputEmail1" accept="application/pdf" name="file_surat">
                                                </div>

                                            </div>

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
          <form action="<?php echo base_url(); ?>suratmasuk/create" method="post" enctype="multipart/form-data">
            <div class="modal-header" style="background-color: #374f65; color: white;">
              <h4 class="modal-title">Tambah Data Surat Masuk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="form-control-label">Jenis Surat</label><br/>
                            <select class="form-control select2_demo_1" name="jenis_surat">
                                    <option value="">-Pilih Jenis Surat-</option>
                                    <?php foreach($jenissurat as $data){ ?>
                                            <option value="<?php echo $data->id_jenis; ?>"><?php echo ucwords($data->jenis); ?></option>
                                    <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                        <label class="form-control-label">Indeks Berkas</label><br/>
                            <select class="form-control select2_demo_1" name="indeks_berkas">
                                    <option value="">-Pilih Kode Indeks-</option>
                                    <?php foreach($indeks as $data){ ?>
                                            <option value="<?php echo $data->id_indeks; ?>"><?php echo strtoupper($data->kode_indeks); ?></option>
                                    <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                        <label class="form-control-label">Tanggal Surat Masuk</label><br/>
                            <input class="form-control" type="text" id="date_1" name="tgl_surat_masuk" required placeholder="Ketikan tanggal surat masuk">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Perihal Surat</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" required name="perihal" placeholder="Ketikan perihal surat">
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Surat</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" required name="nomor_surat" placeholder="Ketikan nomor surat">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Asal Surat</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" required name="asal_surat" placeholder="Ketikan asal surat">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tujuan Surat</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" required name="tujuan_surat" placeholder="Ketikan tujuan surat">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">File Surat</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" required accept="application/pdf" name="file_surat">
                        </div>

                    </div>

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
    swal("Berhasil","Data surat masuk berhasil ditambahkan","success");
<?php }else if($this->session->flashdata('message') == 'error') { ?>
    swal("Berhasil","Data surat masuk gagal ditambahkan","error");
<?php } ?>

<?php if($this->session->flashdata('message2') == 'successfull') { ?>
    swal("Berhasil","Data surat masuk berhasil diubah","success");
<?php }else if($this->session->flashdata('message2') == 'error') { ?>
    swal("Berhasil","Data surat masuk gagal diubah","error");
<?php } ?>

<?php if($this->session->flashdata('message3') == 'successfull') { ?>
    swal("Berhasil","Data surat masuk berhasil dihapus","success");
<?php }else if($this->session->flashdata('message3') == 'error') { ?>
    swal("Berhasil","Data surat masuk gagal dihapus","error");
<?php } ?>
</script>