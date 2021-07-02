<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndeksBerkas extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Auth_model');
        $this->load->model('Calendar_model');
        $this->load->model('IndeksBerkas_model');
        if($this->Auth_model->isNotLogin()) redirect('auth');
    }

	public function index()
	{
        $data['indeks'] = $this->IndeksBerkas_model->showIndeks()->result();

		$this->load->view('parts/header');
        $this->load->view('parts/sidebar');
		$this->load->view('v_indeks-berkas', $data);
		$this->load->view('parts/footer');
	}

    public function create()
    {
        $data = array(
            'kode_indeks' => $this->input->post('kode'),
            'keterangan' => $this->input->post('keterangan'),
            'created_at' => $this->Calendar_model->indocal()
        );

        $simpan = $this->IndeksBerkas_model->createIndeks($data);
        if($simpan)
        {
            $this->session->set_flashdata('message','successfull'); 
            redirect('indeksberkas');
        }
        else
        {
            $this->session->set_flashdata('message','error'); 
            redirect('indeksberkas');
        }

    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'kode_indeks' => $this->input->post('kode'),
            'keterangan' => $this->input->post('keterangan'),
            'updated_at' => $this->Calendar_model->indocal()
        );

        $simpan = $this->IndeksBerkas_model->editIndeks($id, $data);
        if($simpan)
        {
            $this->session->set_flashdata('message2','successfull'); 
            redirect('indeksberkas');
        }
        else
        {
            $this->session->set_flashdata('message2','error'); 
            redirect('indeksberkas');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        
        $hapus = $this->IndeksBerkas_model->deleteIndeks($id);
        if($hapus)
        {
            $this->session->set_flashdata('message3','successfull');
            redirect('indeksberkas');
        }
        else
        {
            $this->session->set_flashdata('message3','error');
            redirect('indeksberkas');
        }
    }


}
