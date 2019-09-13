<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'role' => $this->input->post('role'),
            ];
            $this->db->insert('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New sub menu added!</div>');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Accesss';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAcces()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Access Changed  !</div>');
    }


    public function Golongan()
    {
        $data['title'] = 'Golongan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('golongan', 'Golongan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/golongan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('golongan', ['nm_golongan' => $this->input->post('golongan')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        New menu added!</div>');
            redirect('admin/golongan');
        }
    }


    public function hapus_golongan($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('golongan');

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        Golongan hasbeen deleted!</div>');
        redirect('admin/golongan');
    }


    
    public function edit_golongan($id)
    {
        $this->load->model('Golongan_model');
        $data['golongan']= $this->Golongan_model->getGolonganById($id);      
        $data['title'] = 'Edit Golongan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();   
        
        $this->form_validation->set_rules('nm_golongan', 'Golongan', 'required');
        
        if ($this->form_validation->run() == false) {           
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit_golongan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Golongan_model->editDatagolongan();           
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Golongan hasbeen changed!</div>');
            redirect('admin/golongan');
        }
    }
}
