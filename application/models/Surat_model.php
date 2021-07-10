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
            $this->db->select('*');
            $this->db->from('v_surat_masuk');
            $this->db->where('id_personel', $this->session->userdata('id'));
            $this->db->order_by('id_surat','DESC');   
            $query=$this->db->get();
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
            $this->db->select('*');
            $this->db->from('v_surat_keluar');
            $this->db->where('id_personel', $this->session->userdata('id'));
            $this->db->order_by('id_surat','DESC');   
            $query=$this->db->get();
            return $query;
        }
        
    }

    public function showSuratTerbaru($tgl)
    {
        if($this->session->userdata('user_status') == 'admin'){
            $this->db->select('*');
            $this->db->from('surat');
            $this->db->where('DATE_FORMAT(created_at, "%Y-%m-%d")=', $tgl);
            $this->db->order_by('id_surat','DESC');  
            $query = $this->db->get();     
            return $query;
        }else{
            $this->db->select('*');
            $this->db->from('surat');
            $this->db->where('DATE_FORMAT(created_at, "%Y-%m-%d")=', $tgl);
            $this->db->where('user_uploaded', $this->session->userdata('id'));
            $this->db->order_by('id_surat','DESC');   
            $query=$this->db->get();
            return $query;
        }
        
    }

    public function rekapSurat($tgl)
    {
        $this->db->select('status_surat, COUNT(*) AS jumlah_data');
        $this->db->from('surat');
        $this->db->where('DATE_FORMAT(created_at, "%Y-%m")=', $tgl);
        $this->db->group_by('status_surat','DESC');
        $query=$this->db->get();
        return $query;
    }

    public function rekapSuratGrafikSM($tahun)
    {
        $this->db->select('status_surat, COUNT(*) AS jumlah_data, DATE_FORMAT(created_at, "%m") AS bulan_periode');
        $this->db->from('surat');
        $this->db->where('DATE_FORMAT(created_at, "%Y")=', $tahun);
        $this->db->where('status_surat', 'sm');
        $this->db->group_by(array('status_surat','bulan_periode'));
        $query=$this->db->get();
        return $query;
    }

    public function rekapSuratGrafikSK($tahun)
    {
        $this->db->select('status_surat, COUNT(*) AS jumlah_data, DATE_FORMAT(created_at, "%m") AS bulan_periode');
        $this->db->from('surat');
        $this->db->where('DATE_FORMAT(created_at, "%Y")=', $tahun);
        $this->db->where('status_surat', 'sk');
        $this->db->group_by(array('status_surat','bulan_periode'));
        $query=$this->db->get();
        return $query;
    }

    public function rekapSuratGrafikBulan($tahun)
    {
        $this->db->select('status_surat, DATE_FORMAT(created_at, "%m") AS bulan_periode');
        $this->db->from('surat');
        $this->db->where('DATE_FORMAT(created_at, "%Y")=', $tahun);
        $this->db->group_by(array('status_surat','bulan_periode'));
        $query=$this->db->get();
        return $query;
    }

    public function rekapSuratTabel($bulan)
    {
        if($this->session->userdata('user_status') == 'admin'){
            $this->db->where('DATE_FORMAT(created_at, "%m")=', $bulan);
            $this->db->order_by('created_at','DESC');
            $query=$this->db->get('v_rekap_tabel');
            return $query;
        }else{
            $this->db->where('DATE_FORMAT(created_at, "%m")=', $bulan);
            $this->db->where('user_uploaded', $this->session->userdata('id'));
            $this->db->order_by('created_at','DESC');
            $query=$this->db->get('v_rekap_tabel');
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
        if($this->session->userdata('user_status') == 'admin'){
            $this->db->where('tgl_surat >=', $tgl1);
            $this->db->where('tgl_surat <=', $tgl2);
            $query = $this->db->get('v_surat_masuk');        
            return $query;
        }else{
            $this->db->where('id_personel', $this->session->userdata('id'));
            $this->db->where('tgl_surat <=', $tgl2);
            $this->db->where('tgl_surat <=', $tgl2);
            $query = $this->db->get('v_surat_masuk');        
            return $query;
        }
    }

    public function filterSuratKeluar($tgl1, $tgl2)
    {
        if($this->session->userdata('user_status') == 'admin'){
            $this->db->where('tgl_surat >=',$tgl1);
            $this->db->where('tgl_surat <=',$tgl2);
            $query = $this->db->get('v_surat_keluar');        
            return $query;
        }else{
            $this->db->where('id_personel', $this->session->userdata('id'));
            $this->db->where('tgl_surat >=',$tgl1);
            $this->db->where('tgl_surat <=',$tgl2);
            $query = $this->db->get('v_surat_keluar');        
            return $query;
        }
        
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