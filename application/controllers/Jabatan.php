<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Jabatan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        if ($this->form_validation->run() == false) {
            $data['nm_jabatan'] = $this->db->get('jabatan')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('jabatan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('jabatan', ['nm_jabatan' => $this->input->post('jabatan')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New menu added!</div>');
            redirect('jabatan/index');
        }        
    }

    public function hapus($id)
    {
        
        $this->db->where('id', $id);
        $this->db->delete('jabatan');

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        Jabatan hasbeen deleted!</div>');
        redirect('jabatan');         
    }

    public function edit($id)
    {
        $this->load->model('Jabatan_model');
        $data['jabatan']= $this->Jabatan_model->getJabatanById($id);  
        $data['title'] = 'Jabatan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nm_jabatan', 'Jabatan', 'required');
        
        if ($this->form_validation->run() == false) {           
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('jabatan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Jabatan_model->editDatajabatan(); 
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Jabatan has been changed!</div>');
            redirect('jabatan/index');
        }        
    }
}
