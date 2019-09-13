<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kinerja_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "  SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id`= `user_menu`.`id`
        ";

        return $this->db->query($query)->result_array();
    }
    public function delSubMenu($id)
    {
        $query = " DELETE FROM user_menu WHERE id= $id
        ";

        return $this->db->query($query)->result_array();
    }
    public function tambahDataKinerja()
    {

        $data = [    
            'email' => $this->input->post('email',true),        
            'tanggal' => $this->input->post('tanggal',true),        
            'kegiatan' => $this->input->post('kegiatan',true),        
            'output' => $this->input->post('output',true),        
            'volume' => $this->input->post('volume',true),        
            'satuan' => $this->input->post('satuan',true),        
            'keterangan' => $this->input->post('keterangan',true),        
    ];

        $this->db->insert('kinerja', $data);
    }

    public function hapusDataKinerja($id_kinerja){
        
        $this->db->where('id_kinerja', $id_kinerja);
        $this->db->delete('kinerja');
    }

    public function getAllKinerja(){
        
       return  $this->db->get_where('kinerja', ['email' => $this->session->userdata('email')])->result_array();
    }
   
    public function editDataKinerja(){
        $data = [    
            'email' => $this->input->post('email',true),        
            'tanggal' => $this->input->post('tanggal',true),        
            'kegiatan' => $this->input->post('kegiatan',true),        
            'output' => $this->input->post('output',true),        
            'volume' => $this->input->post('volume',true),        
            'satuan' => $this->input->post('satuan',true),        
            'keterangan' => $this->input->post('keterangan',true)       
    ];

        $this->db->where('id_kinerja',  $this->input->post('id_kinerja',true));
        $this->db->update('kinerja', $data);
    }

    public function getkinerjaById($id_kinerja){

        return  $this->db->get_where('kinerja', ['id_kinerja' => $id_kinerja])->row_array();
    }

    public function cariDataKinerja(){
         $keyword = $this->input->post('keyword', true );
         $this->db->like('kegiatan', $keyword);
         $this->db->or_like('tanggal', $keyword);
         $this->db->like('email', $this->session->userdata('email'));
         return $this->db->get('kinerja')->result_array();
    }


}
