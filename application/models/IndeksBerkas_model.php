<?php

class IndeksBerkas_model extends CI_Model
{

    public function createIndeks($data)
    {
        $indeks = $this->db->insert('indeks_berkas',$data);
        return $indeks;
    }

    public function showIndeks()
    {
        $this->db->order_by('id_indeks','DESC');  
        $query = $this->db->get('indeks_berkas');     
        return $query;
    }

    public function editIndeks($id,$data)
    {
        $this->db->where('id_indeks',$id);
        $this->db->update('indeks_berkas',$data);
        return true;
    }

    public function deleteIndeks($id)
    {
        $this->db->where('id_indeks',$id);
        $this->db->delete('indeks_berkas');
        return true;
    }

}