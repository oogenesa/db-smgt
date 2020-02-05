<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Database_model');
    }
    public function index()
    {
        $data['title'] = 'Overview';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        //$data['charts'] = $this->db->get('data_asm')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('database/index', $data);
        $this->load->view('templates/footer');
    }

    public function gsm()
    {
        $data['title'] = 'GSM';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['data_guru'] = $this->Database_model->getAllGSM();
        if ($this->input->post('keyword')) {
            $data['data_guru'] = $this->Database_model->cariDataGuru();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('database/gsm', $data);
        $this->load->view('templates/footer');
    }

    public function asm()
    {
        $data['title'] = 'ASM';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['data_anak'] = $this->Database_model->getAllASM();
        if ($this->input->post('class_name_param')) {

            $data['data_anak'] = $this->Database_model->getASMByClass($this->input->post('class_name_param'));
        }
        if ($this->input->post('keyword')) {
            $data['data_anak'] = $this->Database_model->cariDataAnak();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('database/asm', $data);
        $this->load->view('templates/footer');
    }


    public function tambahasm()
    {

        $data['class'] = $this->db->get('class_sm')->result_array();
        $data['class_school'] = $this->db->get('age_and_class')->result_array();
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['data_anak'] = $this->Database_model->getAllASM();
        $data['title'] = 'Form Tambah Data Anak';
        $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required|is_unique[data_anak.full_name]|trim',  array(
            'is_unique'     => 'This %s already exists.'
        ));
        $this->form_validation->set_rules('nick_name', 'Nama Panggilan', 'required');
        $this->form_validation->set_rules('mother_name', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('father_name', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('father_job', 'Pekerjaan Ayah', 'required');
        $this->form_validation->set_rules('mother_job', 'Pekerjaan Ibu', 'required');
        $this->form_validation->set_rules('mother_contact', 'Nomor Handphone Ibu', 'required|numeric|trim|min_length[10]');
        $this->form_validation->set_rules('father_contact', 'Nomor Handphone Ayah', 'required|numeric|trim|min_length[10]');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('school_name', 'Sekolah', 'required');
        // $this->form_validation->set_rules('hobby', 'Minat & Bakat', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('database/tambahasm');
            $this->load->view('templates/footer');
        } else {

            $upload_imago = $_FILES['image'];

            if ($upload_imago) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '4096';
                $config['upload_path'] = './assets/img/profileasm/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['data_anak']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profileasm/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Database_model->tambahDataAnak();

            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('/database/asm');
        }
    }
    public function tambahgsm()
    {
        $data['class'] = $this->db->get('class_sm')->result_array();
        $data['class_school'] = $this->db->get('age_and_class')->result_array();
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['data_guru'] = $this->Database_model->getAllGSM();
        $data['title'] = 'Form Tambah Data Guru';
        $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required|is_unique[data_guru.full_name]',  array(
            'is_unique'     => 'This %s already exists.'
        ));
        $this->form_validation->set_rules('nick_name', 'Nama Panggilan', 'required|is_unique[data_guru.nick_name]',  array(
            'is_unique'     => 'This %s already exists.'
        ));
        $this->form_validation->set_rules('priority_class', 'Kelas Utama', 'required');
        //$this->form_validation->set_rules('father_name', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('contact_number', 'Nomor Handphone', 'required|numeric|trim|min_length[10]');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('socmed', 'Media Sosial', 'required');
        $this->form_validation->set_rules('work_place', 'Tempat Kerja/Sekolah/Kampus', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('database/tambahgsm');
            $this->load->view('templates/footer');
        } else {

            $upload_imago = $_FILES['image'];
            if ($upload_imago) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '4096';
                $config['upload_path'] = './assets/img/profilegsm/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['data_anak']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profilegsm/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Database_model->tambahDataGuru();

            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('/database/gsm');
        }
    }
    public function hapusasm($id)
    {
        $this->Database_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('/mahasiswa');
    }
    public function hapusgsm($id)
    {
        $this->Database_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('/mahasiswa');
    }

    public function detailasm($id)
    {
        $data['title'] = 'Overview';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['judul'] = 'Detail Data Anak';
        $data['data_anak'] = $this->Database_model->getASMById($id);
        $data['kehadiran'] = $this->Database_model->getChartKehadiran($id);
        // var_dump($data['kehadiran']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('database/detailasm', $data);
        $this->load->view('templates/footer');
    }
    public function detailgsm($id)
    {
        $data['title'] = 'Overview';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['judul'] = 'Detail Data Anak';
        $data['data_guru'] = $this->Database_model->getGSMById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('database/detailgsm', $data);
        $this->load->view('templates/footer');
    }

    public function ubahasm($id)
    {
        $data['class'] = $this->db->get('class_sm')->result_array();
        $data['class_school'] = $this->db->get('age_and_class')->result_array();
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['title'] = 'Form Ubah Data ASM';
        $data['data_anak'] = $this->Database_model->getASMById($id);

        $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nick_name', 'Nama Panggilan', 'required');
        $this->form_validation->set_rules('mother_name', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('father_name', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('father_job', 'Pekerjaan Ayah', 'required');
        $this->form_validation->set_rules('mother_job', 'Pekerjaan Ibu', 'required');
        $this->form_validation->set_rules('mother_contact', 'Nomor Handphone Ibu', 'required|numeric|trim|min_length[10]');
        $this->form_validation->set_rules('father_contact', 'Nomor Handphone Ayah', 'required|numeric|trim|min_length[10]');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('school_name', 'Sekolah', 'required');
        //$this->form_validation->set_rules('Hobby', 'Minat & Bakat', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('database/ubahasm', $data);
            $this->load->view('templates/footer');
        } else {


            $upload_imago = $_FILES['image'];

            if ($upload_imago) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '4096';
                $config['upload_path'] = './assets/img/profileasm/';


                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['data_anak']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profileasm/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Database_model->ubahDataASM();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('/database/asm');
        }
    }
    public function ubahgsm($id)
    {
        $data['class'] = $this->db->get('class_sm')->result_array();

        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['data_guru'] = $this->Database_model->getGSMById($id);

        $data['title'] = 'Form Tambah Data Guru';
        $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nick_name', 'Nama Panggilan', 'required');
        $this->form_validation->set_rules('priority_class', 'Kelas Utama', 'required');
        $this->form_validation->set_rules('contact_number', 'Nomor Handphone', 'required|numeric|trim|min_length[10]');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('socmed', 'Media Sosial', 'required');
        $this->form_validation->set_rules('work_place', 'Tempat Kerja/Sekolah/Kampus', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('database/ubahgsm', $data);
            $this->load->view('templates/footer');
        } else {

            $upload_imago = $_FILES['image'];
            if ($upload_imago) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '4096';
                $config['upload_path'] = './assets/img/profilegsm/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['data_anak']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profilegsm/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Database_model->ubahDataGSM();

            $this->session->set_flashdata('flash', 'Diubah');
            redirect('/database/gsm');
        }
    }

    public function inputasm2()
    {
        $ids = $this->input->post('id');
        var_dump($ids);
        die;
    }
}
