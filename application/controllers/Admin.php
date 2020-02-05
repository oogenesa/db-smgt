<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['get_new_user'] = $this->Admin_model->getNewUser();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['role'] = $this->db->get('users_role')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }
    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['role'] = $this->db->get_where('users_role', ['id' => $role_id])->row_array();

        $this->db->where('id != 1');
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess()
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
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access change
          </div>');
    }
    public function change_active()
    {
        $id = json_decode($this->input->post('id'));
        $this->Admin_model->changeUserActive($id);
    }

    public function addschedule()
    {
        $data['title'] = 'Add Schedule';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['guru_sermon'] = $this->Admin_model->getGSMByService('sermon');
        $data['guru_worship_leader'] = $this->Admin_model->getGSMByService('worship_leader');
        $data['guru_guitar'] = $this->Admin_model->getGSMByService('guitar');
        $data['guru_assistant'] = $this->Admin_model->getGSMByService('assistant');
        //$data['role'] = $this->db->get('users_role')->result_array();

        $this->form_validation->set_rules('theology_mentor', 'Pendamping Theology', 'required');
        $this->form_validation->set_rules('theme_ai', 'Bahan', 'required');
        $this->form_validation->set_rules('theme_ab', 'Bahan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/addschedule', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->tambahSchedule();

            // $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('/feature/schedule');
        }
    }
    public function inisiasi()
    {
        $data['title'] = 'Inisiasi';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/inisiasi', $data);
        $this->load->view('templates/footer');
    }
    public function doInisiasi()
    {
        $this->Admin_model->startInisiasi();
        $this->session->set_flashdata('flash', 'Inisiasi');
        redirect('/database/asm');
    }
    public function persembahan()
    {
        $data['title'] = 'Persembahan';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['class'] = $this->db->get('class_sm')->result_array();

        $this->form_validation->set_rules('pundi_1', 'Pundi 1', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/persembahan', $data);
            $this->load->view('templates/footer');
        } else {

            $result = $this->Admin_model->tambahPersembahan();

            if ($result) {
                $upload_imago = $_FILES['image'];

                if ($upload_imago) {
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']     = '4096';
                    $config['upload_path'] = './assets/img/bukti_persembahan/';

                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('image')) {
                        //$old_image = $data['persembahan']['image'];
                        // if ($old_image != 'default.jpg') {
                        //     unlink(FCPATH . 'assets/img/bukti_persembahan/' . $old_image);
                        // }
                        $new_image = $this->upload->data('file_name');
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
                $this->session->set_flashdata('flash_success', 'Ditambahkan');
                redirect('/admin/persembahan');
            } else {
                $this->session->set_flashdata('flash_fail', 'Ditambahkan');
                redirect('/admin/persembahan');
            }
        }
    }
}
