<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{

    public function editDatajabatan()
    {
              $data = [    
                'nm_jabatan' => $this->input->post('nm_jabatan',true)        
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('jabatan', $data);
        
    }

    public function getJabatanById($id){

        return  $this->db->get_where('jabatan', ['id' => $id])->row_array();
    }

}
