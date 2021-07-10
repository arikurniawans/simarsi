<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Auth_model');
        $this->load->model('Surat_model');
        $this->load->model('Pengguna_model');
        $this->load->model('Calendar_model');
        if($this->Auth_model->isNotLogin()) redirect('auth');
    }

	public function index()
	{
        $tgl1 = $this->Calendar_model->indodate();
        $tgl2 = $this->Calendar_model->indodate2();
        $tahun = $this->Calendar_model->indoyear();
        $bulan = $this->Calendar_model->indomonth();

        $data['suratmasuk'] = $this->Surat_model->showSuratMasuk()->num_rows();
        $data['suratkeluar'] = $this->Surat_model->showSuratKeluar()->num_rows();
        $data['suratbaru'] = $this->Surat_model->showSuratTerbaru($tgl1)->num_rows();
        $data['rekap'] = $this->Surat_model->rekapSurat($tgl2)->result();
        $data['grafiksm'] = $this->Surat_model->rekapSuratGrafikSM($tahun)->result();
        $data['grafiksk'] = $this->Surat_model->rekapSuratGrafikSK($tahun)->result();
        $data['grafikbln'] = $this->Surat_model->rekapSuratGrafikBulan($tahun)->result();
        $data['rekaptabel'] = $this->Surat_model->rekapSuratTabel($bulan)->result();
        $data['pengguna'] = $this->Pengguna_model->showPengguna()->num_rows();

		$this->load->view('parts/header');
        $this->load->view('parts/sidebar');
		$this->load->view('v_dashboard', $data);
		$this->load->view('parts/footer');
        //var_dump($data['grafik']);
	}
}
