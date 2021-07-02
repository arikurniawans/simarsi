<?php

class JenisSurat_model extends CI_Model
{

    public function createJenis($data)
    {
        $jenis = $this->db->insert('jenis_surat',$data);
        return $jenis;
    }

    public function showJenis()
    {
        $this->db->order_by('id_jenis','DESC');  
        $query = $this->db->get('jenis_surat');     
        return $query;
    }

    public function editPersonel($id,$data)
    {
        $this->db->where('id_personel',$id);
        $this->db->update('personel',$data);
        return true;
    }

    public function deletePersonel($id)
    {
        $this->db->where('id_personel',$id);
        $this->db->delete('personel');
        return true;
    }

}