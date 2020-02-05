<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feature extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Feature_model');
    }
    public function index()
    {
        $data['title'] = 'Note';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['note'] = $this->db->get_where('note', ['show' => 1])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('feature/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambahnote()
    {
        $data['title'] = 'Tambah Note';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $this->form_validation->set_rules('note_text', 'Note', 'required|trim|min_length[5]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('feature/tambahnote', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Feature_model->tambahNote();

            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('/feature');
        }
    }
    public function statistic()
    {
        $data['title'] = 'Statistic';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        //$data['charts'] = $this->db->get('data_asm')->result_array();
        $data['jumlahasm'] = $this->Feature_model->getjumlahasm();
        $data['jumlahgsm'] = $this->Feature_model->getjumlahgsm();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('feature/statistic', $data);
        $this->load->view('templates/footer');
    }
    public function absensi()
    {
        $class_name = 'Anak Indria';
        $date_absensi = date('Y-m-d');

        $data['title'] = 'Absensi';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['absensi'] = $this->Feature_model->getAbsensiASM($class_name, $date_absensi);
        if ($this->input->post('class_name_param')) {
            $class_name = $this->input->post('class_name_param');

            $date_absensi = $this->input->post('date_absensi_param');
            // var_dump($date_absensi);
            // die;
            $data['absensi'] = $this->Feature_model->getAbsensiASM($class_name, $date_absensi);
        }
        $data['class_name'] = $class_name;
        $data['date_absensi'] = $date_absensi;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('feature/absensi', $data);
        $this->load->view('templates/footer');
    }
    public function tambahabsensi()
    {
        $data['title'] = 'Absensi';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['data_anak'] = $this->Feature_model->getASMByClass();
        if ($this->input->post('class_name_param')) {
            $data['data_anak'] = $this->Feature_model->getASMByClass($this->input->post('class_name_param'));
        }
        $data['guru_sermon'] = $this->Feature_model->getGSMByService('sermon');
        $data['guru_worship_leader'] = $this->Feature_model->getGSMByService('worship_leader');
        $data['guru_guitar'] = $this->Feature_model->getGSMByService('guitar');




        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('feature/tambahabsensi', $data);
        $this->load->view('templates/footer');
    }

    public function inputabsensi()
    {
        $this->Feature_model->inputAbsensi();
        $tes = json_decode($this->input->post('objectjson'));
        // $this->load->view('coba/index', $tes);



        // 
    }
    public function schedule()
    {
        $class_name = 'Anak Indria';
        $month_schedule = date('m');
        $year_schedule = date('Y');
        $data['month'] = $month_schedule;

        $data['title'] = 'Schedule';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['schedule'] = $this->Feature_model->getScheduleByMonth($month_schedule, $year_schedule);
        if ($this->input->post('month_param')) {
            $month_schedule = $this->input->post('month_param');
            // var_dump($date_absensi);
            // die;
            $data['schedule'] = $this->Feature_model->getScheduleByMonth($month_schedule, $year_schedule);
            if (isset($data['schedule'])) {
                $data['month'] = $this->input->post('month_param');
                // $data['month'] = date('m', strtotime($data['schedule'][0]['date_kegiatan']));
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('feature/schedule', $data);
        $this->load->view('templates/footer');
    }
    public function birthday()
    {
        $data['title'] = 'Birthday';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['birthday_asm'] = $this->Feature_model->getBirthdayASM();
        $data['birthday_gsm'] = $this->Feature_model->getBirthdayGSM();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('feature/birthday', $data);
        $this->load->view('templates/footer');
    }
}
