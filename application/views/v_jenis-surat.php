<div class="content-wrapper">
            <div class="page-heading">
                <h1 class="page-title">Jenis Surat</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-gear"></i> Pengaturan Jenis Surat</li>
                </ol>
            </div>
            <a href="javascript:void(0);" class="btn btn-info float-sm-right" data-toggle="modal" data-target="#modal-lg">
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data
            </a><br/>
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Tabel Jenis Surat</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr style="background-color: #374f65; color: white;">
                                    <th width="2%">#</th>
                                    <th>Jenis Surat</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($jenissurat as $data){ ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo strtoupper($data->jenis); ?></td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr>
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
          <form action="<?php echo base_url(); ?>jenissurat/create" method="post">
            <div class="modal-header" style="background-color: #374f65; color: white;">
              <h4 class="modal-title">Tambah Data Jenis Surat</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Surat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" required name="jenis" placeholder="Ketikan jenis surat">
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
    swal("Berhasil","Data jenis surat berhasil ditambahkan","success");
<?php }else if($this->session->flashdata('message') == 'error') { ?>
    swal("Berhasil","Data jenis surat gagal ditambahkan","error");
<?php } ?>

<?php if($this->session->flashdata('message2') == 'successfull') { ?>
    swal("Berhasil","Data jenis surat berhasil diubah","success");
<?php }else if($this->session->flashdata('message2') == 'error') { ?>
    swal("Berhasil","Data jenis surat gagal diubah","error");
<?php } ?>

<?php if($this->session->flashdata('message3') == 'successfull') { ?>
    swal("Berhasil","Data jenis surat berhasil dihapus","success");
<?php }else if($this->session->flashdata('message3') == 'error') { ?>
    swal("Berhasil","Data jenis surat gagal dihapus","error");
<?php } ?>
</script>