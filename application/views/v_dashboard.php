<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $suratmasuk; ?></h2>
                                <div class="m-b-5">SURAT MASUK</div><i class="fa fa-envelope widget-stat-icon"></i>
                                <div><small>Total data surat masuk</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $suratkeluar; ?></h2>
                                <div class="m-b-5">SURAT KELUAR</div><i class="fa fa-envelope-o widget-stat-icon"></i>
                                <div><small>Total data surat keluar</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $suratbaru; ?></h2>
                                <div class="m-b-5">SURAT HARI INI</div><i class="fa fa-envelope-open-o widget-stat-icon"></i>
                                <div><small>Total data surat hari ini</small></div>
                            </div>
                        </div>
                    </div>
                    <?php if($this->session->userdata('user_status') == "admin"){ ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $pengguna; ?></h2>
                                <div class="m-b-5">PENGGUNA</div><i class="ti-user widget-stat-icon"></i>
                                <div><small>Total data pengguna</small></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                
                <?php if($this->session->userdata('user_status') == "admin"){ ?>
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Grafik rekapitulasi data arsip surat</div>
                    </div>
                    <div class="ibox-body">
                        <div id ="mygraph"></div>
                    </div>
                </div>
                <?php } ?>

                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Tabel rekapitulasi data arsip surat terbaru bulan ini</div>
                    </div>
                    <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr style="background-color: #374f65; color: white;">
                                    <th>Nomor Surat</th>
                                    <th>Asal Surat</th>
                                    <th>Jenis Surat</th>
                                    <th>Kategori Surat</th>
                                    <th>Tanggal Surat</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($rekaptabel as $data){ ?>
                                <tr>
                                    <td><?php echo $data->nomor_surat; ?></td>
                                    <td><?php echo $data->asal_surat; ?></td>
                                    <td><?php echo $data->jenis; ?></td>
                                    <td><?php if($data->status_surat == "sm"){ echo "Surat Masuk"; }else if($data->status_surat == "sk"){ echo "Surat keluar"; } ?></td>
                                    <td><?php echo $data->tgl_surat; ?></td>
                                </tr>
                            <?php } ?>
                    </tbody>
                    </table>
                    </div>
                </div>

            </div>
            <!-- END PAGE CONTENT-->
<script>
$(document).ready(function() {
    
	var chart1;
        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'mygraph',
                type: 'column'
            },
            title: {
                text: 'Rekapitulasi Data Arsip Surat'
            },
            subtitle: {
                text: 'Periode Tahun : <?php echo date('Y'); ?>'
            },
            xAxis: {
                categories: [
                <?php foreach($grafikbln as $bln){ ?>
                    bulanIndo(<?php echo $bln->bulan_periode; ?>),
                <?php } ?>
                ]
            },
            yAxis: {
                title: {
                    text: 'Jumlah Data Surat'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">Bulan : {point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b> {point.y:1f} File</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            series: [
                {
                    name: ['Surat Masuk'],
                    data: [
                    <?php foreach($grafiksm as $sm){ ?>
                        <?php echo $sm->jumlah_data; ?>,
                    <?php } ?>
                    ]
                },
                {
                    name: 'Surat Keluar',
                    data: [
                    <?php foreach($grafiksk as $sk){ ?>
                        <?php echo $sk->jumlah_data; ?>,
                    <?php } ?>
                    ]
                }
            ]
        });

        function bulanIndo(bln){
            var xbulan = new Date(''+bln+'').getMonth();
            var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
            //console.log(xbulan);
            return ''+bulan[xbulan]+'';
        }
});

</script>