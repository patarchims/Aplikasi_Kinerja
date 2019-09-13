<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Golongan_model extends CI_Model
{

    public function editDatagolongan()
    {
              $data = [    
                'nm_golongan' => $this->input->post('nm_golongan',true)        
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('golongan', $data);
        
    }

    public function getGolonganById($id){

        return  $this->db->get_where('golongan', ['id' => $id])->row_array();
    }

}
