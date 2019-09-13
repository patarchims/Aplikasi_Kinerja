<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{

    public function hapusDataKaryawan($id){
        
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function getJabatanById($id){

        return  $this->db->get_where('jabatan', ['id' => $id])->row_array();
    }
    public function getAllDataKaryawan(){

        return  $this->db->get_where('user')->result_array();
    }
    public function getAllDataAccess(){

        return  $this->db->get_where('user_role')->result_array();
    }

    public function cariDataKaryawan(){
        $keyword = $this->input->post('keyword_cari', true );
        $this->db->like('name', $keyword); 
        $this->db->or_like('email', $keyword); 
        $this->db->or_like('jabatan', $keyword); 
        return $this->db->get('user')->result_array();
    }


}
