<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Auth_model');
        $this->load->model('Calendar_model');
        $this->load->model('Pengguna_model');
        $this->load->model('Roles_model');
        if($this->Auth_model->isNotLogin()) redirect('auth');
    }

	public function index()
	{
        $data['pengguna'] = $this->Pengguna_model->showPengguna()->result();

		$this->load->view('parts/header');
        $this->load->view('parts/sidebar');
		$this->load->view('v_pengguna', $data);
		$this->load->view('parts/footer');
	}

    public function show($id)
	{
        $data['pengguna'] = $this->Pengguna_model->detailPengguna($id)->row();
        $data['role'] = $this->Roles_model->showRoles($data['pengguna']->nrp)->result();

        $data['id_personel'] = $data['pengguna']->id_personel;
        $data['nama'] = $data['pengguna']->nama;
        $data['nrp'] = $data['pengguna']->nrp;
        $data['pangkat'] = $data['pengguna']->pangkat;
        $data['jabatan'] = $data['pengguna']->jabatan;
        $data['no_telpon'] = $data['pengguna']->no_telpon;
        $data['otoritas'] = $data['pengguna']->user_status;

		$this->load->view('parts/header');
        $this->load->view('parts/sidebar');
		$this->load->view('v_detail-pengguna', $data);
		$this->load->view('parts/footer');
	}

    public function create()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'pangkat' => $this->input->post('pangkat'),
            'nrp' => $this->input->post('nrp'),
            'jabatan' => $this->input->post('jabatan'),
            'no_telpon' => $this->input->post('telp'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('nrp'), PASSWORD_BCRYPT),
            'user_status' => $this->input->post('otoritas')
        );

        $rolesdata = array();

        array_push($rolesdata, array(
            'nrp' => $this->input->post('nrp'),
            'menus' => 'suratmasuk',
            'role' => 'F',
            'created_at' => $this->Calendar_model->indocal()
        ));

        array_push($rolesdata, array(
            'nrp' => $this->input->post('nrp'),
            'menus' => 'suratkeluar',
            'role' => 'F',
            'created_at' => $this->Calendar_model->indocal()
        ));

        array_push($rolesdata, array(
            'nrp' => $this->input->post('nrp'),
            'menus' => 'laporansuratmasuk',
            'role' => 'F',
            'created_at' => $this->Calendar_model->indocal()
        ));

        array_push($rolesdata, array(
            'nrp' => $this->input->post('nrp'),
            'menus' => 'laporansuratkeluar',
            'role' => 'F',
            'created_at' => $this->Calendar_model->indocal()
        ));

        foreach($rolesdata as $a){
            $datarole = array(
                'nrp' => $a['nrp'],
                'menus' => $a['menus'],
                'role' => $a['role'],
                'created_at' => $a['created_at']
            );
            $generate = $this->Roles_model->createRoles($datarole);
        }

        $simpan = $this->Pengguna_model->createPengguna($data);

        if($simpan)
        {
            $this->session->set_flashdata('message','successfull'); 
            redirect('pengguna');
        }
        else
        {
            $this->session->set_flashdata('message','error'); 
            redirect('pengguna');
        }

    }

    public function edit()
    {
        $id = $this->input->post('id');

        $data = array(
            'nama' => $this->input->post('nama'),
            'pangkat' => $this->input->post('pangkat'),
            'nrp' => $this->input->post('nrp'),
            'jabatan' => $this->input->post('jabatan'),
            'no_telpon' => $this->input->post('telp'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('nrp'), PASSWORD_BCRYPT),
            'user_status' => $this->input->post('otoritas')
        );
        $ubah = $this->Pengguna_model->editPengguna($id, $data);
        if($ubah)
        {
            $this->session->set_flashdata('message2','successfull'); 
            redirect('pengguna');
        }
        else
        {
            $this->session->set_flashdata('message2','error'); 
            redirect('pengguna');
        }
    }

    public function editrole()
    {
        $id = $this->input->post('id');
        $id_personel = $this->input->post('id_personel');

        if($this->input->post('role') == 'F')
        {
            $role = 'T';
        }else if($this->input->post('role') == 'T')
        {
            $role = 'F';
        }

        $data = array(
            'role' => $role,
            'updated_at' => $this->Calendar_model->indocal()
        );

        $ubah = $this->Roles_model->editRoles($id, $data);
        if($ubah)
        {
            $this->session->set_flashdata('message','successfull'); 
            redirect('pengguna/show/'.$id_personel);
        }
        else
        {
            $this->session->set_flashdata('message','error'); 
            redirect('pengguna/show/'.$id_personel);
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        
        $hapus = $this->Pengguna_model->deletePengguna($id);
        if($hapus)
        {
            $this->session->set_flashdata('message3','successfull');
            redirect('pengguna');
        }
        else
        {
            $this->session->set_flashdata('message3','error');
            redirect('pengguna');
        }
    }



}
