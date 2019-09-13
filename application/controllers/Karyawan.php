<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
   
    public function index()
    {   
        $this->load->model('Karyawan_model');
        $data['title'] = 'Karyawan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['karyawan']= $this->Karyawan_model->getAllDataKaryawan();
        if( $this->input->post('keyword_cari')){
            $data['karyawan'] = $this->Karyawan_model->cariDataKaryawan();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('karyawan/index', $data);
        $this->load->view('templates/footer');
    }

    public function karyawan_detail($id)
    {
        
        $data['title'] = 'Detail Karyawan';
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('karyawan/karyawan_detail', $data);
        $this->load->view('templates/footer');
    }


    public function karyawan_edit($id)
    {
        $this->load->model('Karyawan_model');
        $data['title'] = 'Edit Karyawan';
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['access']= $this->Karyawan_model->getAllDataAccess();  

        $this->form_validation->set_rules('name', 'Nama', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('karyawan/karyawan_edit', $data);
            $this->load->view('templates/footer');  
        }else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $nip = $this->input->post('nip');
            $golongan = $this->input->post('golongan');
            $jabatan = $this->input->post('jabatan');
            $pendidikan = $this->input->post('pendidikan');
            $tmpt_lahir = $this->input->post('tmpt_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $no_hp = $this->input->post('no_hp');
            $is_active = $this->input->post('is_active');   
            $role = $this->input->post('role');   

            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('role_id', $role);
            $this->db->set('is_active', $is_active);
            $this->db->set('name', $name);
            $this->db->set('nip', $nip);
            $this->db->set('golongan', $golongan);
            $this->db->set('jabatan', $jabatan);
            $this->db->set('pendidikan', $pendidikan);
            $this->db->set('tmpt_lahir', $tmpt_lahir);
            $this->db->set('tgl_lahir', $tgl_lahir);
            $this->db->set('no_hp', $no_hp);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data user has been updated!</div>');
            redirect('karyawan');
        }
    }


    
    
    public function hapus_karyawan($id){
        $this->load->model('Karyawan_model');
        $this->Karyawan_model->hapusDataKaryawan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        Data karyawan has been deleted!</div>');
        redirect('karyawan');
    }
}