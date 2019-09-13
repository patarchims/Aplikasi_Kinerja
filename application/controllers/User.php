<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit()

    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('golongan', 'Golongan', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
        $this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $nip = $this->input->post('nip');
            $golongan = $this->input->post('golongan');
            $jabatan = $this->input->post('jabatan');
            $pendidikan = $this->input->post('pendidikan');
            $tmpt_lahir = $this->input->post('tmpt_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $no_hp = $this->input->post('no_hp');

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
            Your profile has been updated!</div>');
            redirect('user');
        }
    }


    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm Password', 'required|trim|min_length[3]|matches[new_password1]');


        if ($this->form_validation->run() == false) {
            $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Current Password!</div>');
                redirect('user/changepassword');
            } else {

                if ($current_password == $new_password) {

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            New Password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    //password yang benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }


    public function kinerja()
    {
        $this->load->model('Kinerja_model');
        $data['title'] = 'Kinerja';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kinerja']= $this->Kinerja_model->getAllKinerja();
        if( $this->input->post('keyword')){
            $data['kinerja'] = $this->Kinerja_model->cariDataKinerja();
        } else if($this->input->post('kegiatan')){            
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
            $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
            $this->form_validation->set_rules('output', 'Output', 'required');
            $this->form_validation->set_rules('volume', 'Volume', 'required');
            $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        }

        if ($this->form_validation->run() == false) {            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/kinerja', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kinerja_model->tambahDataKinerja();             
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New kinerja added!</div>');
            redirect('user/kinerja');
        }
    }

    public function cetak_kinerja(){
        $this->load->model('Kinerja_model');
        $data['title'] = 'Cetak Data Kinerja';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kinerja']= $this->Kinerja_model->getAllKinerja();
        $this->load->view('templates/header_report', $data);
        $this->load->view('user/cetak_kinerja', $data);
        $this->load->view('templates/footer_report');
    }

    public function hapus_kinerja($id_kinerja){
        $this->load->model('Kinerja_model');
        $this->Kinerja_model->hapusDataKinerja($id_kinerja);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        Data kinerja has been deleted!</div>');
        redirect('user/kinerja');
    }


    public function kinerja_edit($id_kinerja)
    {
        $this->load->model('Kinerja_model');       
        $data['title'] = 'Kinerja';
        $data['kinerja'] =  $this->Kinerja_model->getkinerjaById($id_kinerja);   
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
        $this->form_validation->set_rules('output', 'Output', 'required');
        $this->form_validation->set_rules('volume', 'Volume', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');

        if ($this->form_validation->run() == false) {            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/kinerja_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kinerja_model->editDataKinerja();             
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data kinerja has been changed!</div>');
            redirect('user/kinerja');
        }
    }
}
