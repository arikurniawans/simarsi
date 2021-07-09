<div class="content-wrapper">
            <div class="page-heading">
                <h1 class="page-title">Laporan Surat Keluar</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-print"></i> Data Laporan Surat Keluar</li>
                </ol>
            </div>
            <form class="form-inline float-sm-right" method="post" action="<?php echo base_url(); ?>laporan/laporansuratkeluar">
                            <label class="sr-only" for="ex-email">Periode 1</label>
                            <input class="form-control mb-2 mr-sm-2 mb-sm-0" id="date_1" type="text" autocomplete="off" name="tgl1" placeholder="Periode 1">
                            <label class="sr-only" for="ex-pass">Periode 2</label>
                            <input class="form-control mb-2 mr-sm-2 mb-sm-0" id="date_2" type="text" autocomplete="off" name="tgl2" placeholder="Periode 2">
                            <button class="btn btn-primary" type="submit">Filter Data</button>
                        </form><br/>
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Tabel Surat Keluar</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr style="background-color: #374f65; color: white;">
                                    <th width="2%">#</th>
                                    <th width="15%">Nomor Surat</th>
                                    <th>Asal Surat</th>
                                    <th width="15%">Tanggal Surat</th>
                                    <th>Perihal</th>
                                    <th>Tujuan</th>
                                    <th>Jenis Surat</th>
                                    <th>Kode Indeks</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($surat as $data){ ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data->nomor_surat; ?></td>
                                    <td><?php echo $data->asal_surat; ?></td>
                                    <td><?php echo $data->tgl_surat; ?></td>
                                    <td><?php echo $data->perihal; ?></td>
                                    <td><?php echo $data->tujuan_surat; ?></td>
                                    <td><?php echo $data->jenis; ?></td>
                                    <td><?php echo $data->kode_indeks; ?></td>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
</div>
<!-- END PAGE CONTENT-->

