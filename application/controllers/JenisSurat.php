<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisSurat extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Auth_model');
        $this->load->model('Calendar_model');
        $this->load->model('JenisSurat_model');
        if($this->Auth_model->isNotLogin()) redirect('auth');
    }

	public function index()
	{
        $data['jenissurat'] = $this->JenisSurat_model->showJenis()->result();

		$this->load->view('parts/header');
        $this->load->view('parts/sidebar');
		$this->load->view('v_jenis-surat', $data);
		$this->load->view('parts/footer');
	}

    public function create()
    {
        $data = array(
            'jenis' => $this->input->post('jenis'),
            'created_at' => $this->Calendar_model->indocal()
        );

        $simpan = $this->JenisSurat_model->createJenis($data);
        if($simpan)
        {
            $this->session->set_flashdata('message','successfull'); 
            redirect('jenissurat');
        }
        else
        {
            $this->session->set_flashdata('message','error'); 
            redirect('jenissurat');
        }

    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'jenis' => $this->input->post('jenis'),
            'updated_at' => $this->Calendar_model->indocal()
        );

        $simpan = $this->JenisSurat_model->editJenis($id, $data);
        if($simpan)
        {
            $this->session->set_flashdata('message2','successfull'); 
            redirect('jenissurat');
        }
        else
        {
            $this->session->set_flashdata('message2','error'); 
            redirect('jenissurat');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        
        $hapus = $this->JenisSurat_model->deleteJenis($id);
        if($hapus)
        {
            $this->session->set_flashdata('message3','successfull');
            redirect('jenissurat');
        }
        else
        {
            $this->session->set_flashdata('message3','error');
            redirect('jenissurat');
        }
    }


}
