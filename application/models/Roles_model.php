<?php

class Roles_model extends CI_Model
{

    public function createRoles($data)
    {
        $pengguna = $this->db->insert('role_management',$data);
        return $pengguna;
    }

    public function showRoles($nrp)
    {
        // $this->db->order_by('id_role','DESC'); 
        $query = $this->db->get_where('role_management', array('nrp' => $nrp));     
        return $query;
    }

    public function editRoles($id,$data)
    {
        $this->db->where('id_role',$id);
        $this->db->update('role_management',$data);
        return true;
    }

}