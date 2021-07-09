<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratMasuk extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("file");
        $this->load->helper('path');
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Auth_model');
        $this->load->model('Calendar_model');
        $this->load->model('JenisSurat_model');
        $this->load->model('IndeksBerkas_model');
        $this->load->model('Surat_model');
        if($this->Auth_model->isNotLogin()) redirect('auth');

    }

	public function index()
	{
        $data['jenissurat'] = $this->JenisSurat_model->showJenis()->result();
        $data['indeks'] = $this->IndeksBerkas_model->showIndeks()->result();
        $data['surat'] = $this->Surat_model->showSuratMasuk()->result();

		$this->load->view('parts/header');
        $this->load->view('parts/sidebar');
		$this->load->view('v_surat-masuk', $data);
		$this->load->view('parts/footer');
	}

    public function create()
    {
        $berkas = $_FILES['file_surat']['name'];
        $config['upload_path'] = './file_suratmasuk';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('file_surat')){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', $error); 
			$this->load->view('parts/header');
            $this->load->view('parts/sidebar');
            $this->load->view('v_surat-masuk');
            $this->load->view('parts/footer');
        }else{
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            
            $data = array(
                'jenis_surat' => $this->input->post('jenis_surat'),
                'indeks_berkas' => $this->input->post('indeks_berkas'),
                'tgl_surat' => $this->input->post('tgl_surat_masuk'),
                'perihal' => $this->input->post('perihal'),
                'nomor_surat' => $this->input->post('nomor_surat'),
                'asal_surat' => $this->input->post('asal_surat'),
                'tujuan_surat' => $this->input->post('tujuan_surat'),
                'file_surat' => $file_name,
                'status_surat' => 'sm',
                'user_uploaded' => $this->session->userdata('id'),
                'created_at' => $this->Calendar_model->indocal()
            );
    
            $simpan = $this->Surat_model->createSuratMasuk($data);
            if($simpan)
            {
                $this->session->set_flashdata('message','successfull'); 
                redirect('suratmasuk');
            }
            else
            {
                $this->session->set_flashdata('message','error'); 
                redirect('suratmasuk');
            }
        }

    }

    public function edit()
    {
        $id = $this->input->post('id');

        $berkas = $_FILES['file_surat']['name'];
        $config['upload_path'] = './file_suratmasuk';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $surat = $this->Surat_model->detailSuratMasuk($id)->row();

        if($berkas == ""){

            $data = array(
                'jenis_surat' => $this->input->post('jenis_surat'),
                'indeks_berkas' => $this->input->post('indeks_berkas'),
                'tgl_surat' => $this->input->post('tgl_surat_masuk'),
                'perihal' => $this->input->post('perihal'),
                'nomor_surat' => $this->input->post('nomor_surat'),
                'asal_surat' => $this->input->post('asal_surat'),
                'tujuan_surat' => $this->input->post('tujuan_surat'),
                'user_uploaded' => $this->session->userdata('id'),
                'updated_at' => $this->Calendar_model->indocal()
            );
    
            $simpan = $this->Surat_model->editSurat($id, $data);
            if($simpan)
            {
                $this->session->set_flashdata('message2','successfull'); 
                redirect('suratmasuk');
            }
            else
            {
                $this->session->set_flashdata('message2','error'); 
                redirect('suratmasuk');
            }
        }else{
            $target = './file_suratmasuk/'.$surat->file_surat;
            unlink($target);

            if ( ! $this->upload->do_upload('file_surat')){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', $error); 
                $this->load->view('parts/header');
                $this->load->view('parts/sidebar');
                $this->load->view('v_surat-keluar');
                $this->load->view('parts/footer');
            }else{
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];

                $data = array(
                    'jenis_surat' => $this->input->post('jenis_surat'),
                    'indeks_berkas' => $this->input->post('indeks_berkas'),
                    'tgl_surat' => $this->input->post('tgl_surat_masuk'),
                    'perihal' => $this->input->post('perihal'),
                    'nomor_surat' => $this->input->post('nomor_surat'),
                    'asal_surat' => $this->input->post('asal_surat'),
                    'tujuan_surat' => $this->input->post('tujuan_surat'),
                    'file_surat' => $file_name,
                    'status_surat' => 'sm',
                    'user_uploaded' => $this->session->userdata('id'),
                    'updated_at' => $this->Calendar_model->indocal()
                );
        
                $simpan = $this->Surat_model->editSurat($id, $data);
                if($simpan)
                {
                    $this->session->set_flashdata('message2','successfull'); 
                    redirect('suratmasuk');
                }
                else
                {
                    $this->session->set_flashdata('message2','error'); 
                    redirect('suratmasuk');
                }
            }
            
        }

    }

    public function delete()
    {
        $id = $this->input->post('id');

        $surat = $this->Surat_model->detailSuratMasuk($id)->row();
        $target = './file_suratmasuk/'.$surat->file_surat;
        unlink($target);
        
        $hapus = $this->Surat_model->deleteSuratMasuk($id);
        if($hapus)
        {
            $this->session->set_flashdata('message3','successfull');
            redirect('suratmasuk');
        }
        else
        {
            $this->session->set_flashdata('message3','error');
            redirect('suratmasuk');
        }
    }

    public function show($id){
        $data['surat'] = $this->Surat_model->detailSuratMasuk($id)->row();

        $data['nomor'] = $data['surat']->nomor_surat;
        $data['perihal'] = $data['surat']->perihal;
        $data['asal'] = $data['surat']->asal_surat;
        $data['tujuan'] = $data['surat']->tujuan_surat;
        $data['jenis'] = $data['surat']->jenis;
        $data['indeks'] = $data['surat']->kode_indeks;
        $data['file_surat'] = $data['surat']->file_surat;

        $this->load->view('parts/header');
		$this->load->view('parts/sidebar');
		$this->load->view('v_detail-surat-masuk', $data);
		$this->load->view('parts/footer');
    }


}
