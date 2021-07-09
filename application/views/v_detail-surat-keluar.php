<div class="content-wrapper">
            <div class="page-heading">
                <h1 class="page-title">Detail Surat Keluar</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-envelope"></i> Detail Data Surat Keluar</li>
                </ol>
            </div>
            <a href="<?php echo base_url(); ?>suratkeluar" class="btn btn-default float-sm-right">
                    <i class="fa fa-step-backward" aria-hidden="true"></i> Kembali
            </a><br/>
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Detail Surat Keluar</div>
                    </div>
                    <div class="ibox-body">
                                <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                            <td width="20%"><b>Nomor Surat</b></td>
                                            <td width="2%">:</td>
                                            <td><?php echo $nomor; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Perihal</b></td>
                                            <td width="2%">:</td>
                                            <td><?php echo $perihal; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Asal Surat</b></td>
                                            <td width="2%">:</td>
                                            <td><?php echo $asal; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Tujuan Surat</b></td>
                                            <td width="2%">:</td>
                                            <td><?php echo $tujuan; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Jenis Surat</b></td>
                                            <td width="2%">:</td>
                                            <td><?php echo $jenis; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Indeks Berkas</b></td>
                                            <td width="2%">:</td>
                                            <td><?php echo $indeks; ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                            </div>
                    </div>
                </div>

                <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">File Surat Keluar</div>
                    </div>
                    <div class="ibox-body">
                    <iframe src="<?php echo base_url(); ?>file_suratkeluar/<?php echo $file_surat; ?>" height="500" width="100%"></iframe>
                            </div>
                    </div>
                </div>

</div>
<!-- END PAGE CONTENT-->
