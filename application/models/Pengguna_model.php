<?php

class Pengguna_model extends CI_Model
{

    public function createPengguna($data)
    {
        $pengguna = $this->db->insert('users',$data);
        return $pengguna;
    }

    public function showPengguna()
    {
        $this->db->order_by('id_personel','DESC');
        $query = $this->db->where_not_in('user_status', 'admin');    
        $query = $this->db->get('users');     
        return $query;
    }

    public function detailPengguna($id)
    {
        $query = $this->db->get_where('users',array('id_personel' => $id));     
        return $query;
    }

    public function editPengguna($id,$data)
    {
        $this->db->where('id_personel',$id);
        $this->db->update('users',$data);
        return true;
    }

    public function deletePengguna($id)
    {
        $this->db->where('id_personel',$id);
        $this->db->delete('users');
        return true;
    }

}