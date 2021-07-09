<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("file");
        $this->load->helper('path');
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->library('Pdff');
        $this->load->model('Auth_model');
        $this->load->model('Calendar_model');
        $this->load->model('JenisSurat_model');
        $this->load->model('IndeksBerkas_model');
        $this->load->model('Surat_model');
        if($this->Auth_model->isNotLogin()) redirect('auth');

    }

	public function index()
	{
        $surat = $this->Surat_model->showSuratMasuk()->result();
        $no=0;
        $column_nomor_surat = "";
        $column_asal_surat = "";
        $column_tgl_surat = "";
        $column_tujuan_surat = "";
        $column_jenis_surat = "";
        $column_kode_indeks = "";

        foreach ($surat as $data){
            $column_nomor_surat = $column_nomor_surat.$data->nomor_surat."\n";
            $column_asal_surat = $column_asal_surat.$data->asal_surat."\n";
            $column_tgl_surat = $column_tgl_surat.$data->tgl_surat."\n";
            $column_tujuan_surat = $column_tujuan_surat.$data->tujuan_surat."\n";
            $column_jenis_surat = $column_jenis_surat.$data->jenis."\n";
            $column_kode_indeks = $column_kode_indeks.$data->kode_indeks."\n";

        $pdf=new FPDF();

        $pdf->SetAutoPageBreak(true, 5);
        //Mulai dokumen
        $pdf->AddPage('L', 'A4');
        $pdf->Image('assets/prov_lampung.png',10,10,20,27);
        $pdf->Image('assets/Lambang_Polda_Lampung.png',263,10,20,25);
        $pdf->SetFont('Times','B','10');
        //meletakkan judul disamping logo diatas
        $pdf->SetY(16);
        $pdf->Cell(10);
        $pdf->SetFont('Times','B','12');
        $pdf->Cell(0,5,'POLDA PROVINSI LAMPUNG',0,1,'C');
        $pdf->Cell(8);
        $pdf->SetFont('Times','B','17');
        $pdf->Cell(0,6,'POLRES LAMPUNG TIMUR',0,1,'C');
        $pdf->Cell(11);
        $pdf->SetFont('Times','B','8');
        $pdf->Cell(0,5,'Jalan Letnan Adnan Sanjaya No.09, Terbanggi Marga, Sukadana, Kabupaten Lampung Timur, Lampung 34394',0,1,'C');
        $pdf->Cell(11);
        $pdf->Cell(0,2,'Telp. (0725) 625113, web : www.polreslampungtimur.com',0,1,'C');
        $pdf->SetX(200);
        //membuat garis ganda tebal dan tipis
        $pdf->SetLineWidth(1);
        $pdf->Line(10,42,285,42);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,43,285,43);

        $pdf->SetY(50);
        $pdf->Cell(10);
        $pdf->SetFont('Times','B','12');
        $pdf->Cell(0,5,'LAPORAN DATA SURAT MASUK',0,1,'C');
        $pdf->SetY(60);
        $pdf->Cell(0,5,'Tanggal : ',0,1,'L');

        $pdf->Ln();
        }
        //Fields Name position
        $Y_Fields_Name_position = 65;

        $pdf->SetFillColor(110,180,230);
        $pdf->SetFont('Arial','B',10);
        $pdf->SetY($Y_Fields_Name_position);
        $pdf->SetX(10);
        $pdf->Cell(65,8,'No. Surat',1,0,'C',1);
        $pdf->SetX(75);
        $pdf->Cell(60,8,'Asal Surat',1,0,'C',1);
        $pdf->SetX(135);
        $pdf->Cell(35,8,'Tanggal Surat',1,0,'C',1);
        $pdf->SetX(170);
        $pdf->Cell(60,8,'Tujuan Surat',1,0,'C',1);
        $pdf->SetX(225);
        $pdf->Cell(35,8,'Jenis Surat',1,0,'C',1);
        $pdf->SetX(260);
        $pdf->Cell(25,8,'Kode Indeks',1,0,'C',1);
        $pdf->SetX(260);

        $Y_Table_Position = 73;
        $pdf->SetFont('Arial','', 8);

        

        $pdf->SetY($Y_Table_Position);
        $pdf->SetX(10);
        $pdf->MultiCell(65,6,$column_nomor_surat,1,'L');

        $pdf->SetY($Y_Table_Position);
        $pdf->SetX(75);
        $pdf->MultiCell(60,6,$column_asal_surat,1,'L');

        $pdf->SetY($Y_Table_Position);
        $pdf->SetX(135);
        $pdf->MultiCell(35,6,$column_tgl_surat,1,'C');

        $pdf->SetY($Y_Table_Position);
        $pdf->SetX(170);
        $pdf->MultiCell(55,6,$column_tujuan_surat,1,'L');

        $pdf->SetY($Y_Table_Position);
        $pdf->SetX(225);
        $pdf->MultiCell(35,6,$column_jenis_surat,1,'L');

        $pdf->SetY($Y_Table_Position);
        $pdf->SetX(260);
        $pdf->MultiCell(25,6,$column_kode_indeks,1,'C');
        

        $pdf->Output('laporansuratmasuk.pdf','I');
    
	}

    public function laporansuratmasuk()
	{
        if($this->input->post() != null){
            $tgl1 = $this->input->post('tgl1');
            $tgl2 = $this->input->post('tgl2');

            if($tgl1 == "" || $tgl2 == ""){
                $data['surat'] = $this->Surat_model->showSuratMasuk()->result();
            }else{
                $data['surat'] = $this->Surat_model->filterSuratMasuk($tgl1, $tgl2)->result();
            }

            $this->load->view('parts/header');
            $this->load->view('parts/sidebar');
            $this->load->view('v_laporan-sm', $data);
            $this->load->view('parts/footer');
        }else{
            $data['surat'] = $this->Surat_model->showSuratMasuk()->result();

            $this->load->view('parts/header');
            $this->load->view('parts/sidebar');
            $this->load->view('v_laporan-sm', $data);
            $this->load->view('parts/footer');
        }

	}

    public function laporansuratkeluar()
	{
        if($this->input->post() != null){
            $tgl1 = $this->input->post('tgl1');
            $tgl2 = $this->input->post('tgl2');

            if($tgl1 == "" || $tgl2 == ""){
                $data['surat'] = $this->Surat_model->showSuratKeluar()->result();
            }else{
                $data['surat'] = $this->Surat_model->filterSuratKeluar($tgl1, $tgl2)->result();
            }

            $this->load->view('parts/header');
            $this->load->view('parts/sidebar');
            $this->load->view('v_laporan-sk', $data);
            $this->load->view('parts/footer');
        }else{
            $data['surat'] = $this->Surat_model->showSuratKeluar()->result();

            $this->load->view('parts/header');
            $this->load->view('parts/sidebar');
            $this->load->view('v_laporan-sk', $data);
            $this->load->view('parts/footer');
        }

	}


    // public function myCell($w, $h, $x, $t){
    //     $pdf=new FPDF();
    //     $pdf->AddPage('L', 'A4');
    //     $pdf->Ln(4);
    //     $pdf->SetFont('Arial', '', 12);

    //     $height = $h/3;
    //     $first = $height+2;
    //     $second = $height+$height+$height+3;
    //     $len = strlen($t);
    //     if($len>15){
    //         $txt = str_split($t, 15);
    //         $pdf->SetX($x);
    //         $pdf->Cell($w,$first,$txt[0],'','','');
    //         $pdf->SetX($x);
    //         $pdf->Cell($w,$second,$txt[1],'','','');
    //         $pdf->SetX($x);
    //         $pdf->Cell($w,$h,0,'L',1);
    //     }else{
    //         $pdf->SetX($x);
    //         $pdf->Cell($w,$h,$t,0,'L',1);
    //     }
    // }


}