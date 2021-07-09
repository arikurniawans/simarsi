<?php

class Surat_model extends CI_Model
{

    public function createSuratMasuk($data)
    {
        $surat = $this->db->insert('surat',$data);
        return $surat;
    }

    public function createSuratKeluar($data)
    {
        $surat = $this->db->insert('surat',$data);
        return $surat;
    }

    public function showSuratMasuk()
    {
        if($this->session->userdata('user_status') == 'admin'){
            $this->db->order_by('id_surat','DESC');  
            $query = $this->db->get('v_surat_masuk');     
            return $query;
        }else{
            $this->db->order_by('id_surat','DESC');  
            $query = $this->db->get_where('v_surat_masuk', array('id_personel', $this->session->userdata('id')));     
            return $query;
        }
        
    }

    public function showSuratKeluar()
    {
        if($this->session->userdata('user_status') == 'admin'){
            $this->db->order_by('id_surat','DESC');  
            $query = $this->db->get('v_surat_keluar');     
            return $query;
        }else{
            $this->db->order_by('id_surat','DESC');  
            $query = $this->db->get_where('v_surat_keluar', array('id_personel', $this->session->userdata('id')));     
            return $query;
        }
        
    }

    public function detailSuratMasuk($id)
    {
        $query = $this->db->get_where('v_surat_masuk', array('id_surat' => $id));        
        return $query;
    }

    public function filterSuratMasuk($tgl1, $tgl2)
    {
        $this->db->where('tgl_surat >=',$tgl1);
        $this->db->where('tgl_surat <=',$tgl2);
        $query = $this->db->get('v_surat_masuk');        
        return $query;
    }

    public function filterSuratKeluar($tgl1, $tgl2)
    {
        $this->db->where('tgl_surat >=',$tgl1);
        $this->db->where('tgl_surat <=',$tgl2);
        $query = $this->db->get('v_surat_keluar');        
        return $query;
    }

    public function editSurat($id,$data)
    {
        $this->db->where('id_surat',$id);
        $this->db->update('surat',$data);
        return true;
    }

    public function deleteSuratMasuk($id)
    {
        $this->db->where('id_surat',$id);
        $this->db->delete('surat');
        return true;
    }

    public function detailSuratKeluar($id)
    {
        $query = $this->db->get_where('v_surat_keluar', array('id_surat' => $id));        
        return $query;
    }

    public function editSuratKeluar($id,$data)
    {
        $this->db->where('id_surat',$id);
        $this->db->update('surat',$data);
        return true;
    }

    public function deleteSuratKeluar($id)
    {
        $this->db->where('id_surat',$id);
        $this->db->delete('surat');
        return true;
    }

}