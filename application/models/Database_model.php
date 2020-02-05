<?php

class Database_model extends CI_model
{
    // public function getAllMahasiswa()
    // {
    //     return $this->db->get('mahasiswa')->result_array();
    // }
    public function getAllASM()
    {
        $this->db->order_by('birth_date', 'DESC');
        //$this->db->order_by('class_name', 'DESC');
        return $this->db->get('data_anak')->result_array();
    }
    public function getAllGSM()
    {
        $this->db->order_by('id_guru', 'ASC');
        //$this->db->limit('2');
        return $this->db->get('data_guru')->result_array();
    }
    public function tambahDataAnak()
    {
        if ($_FILES['image']['name']) {
            $data = [
                "full_name" => $this->input->post('full_name', true),
                "nick_name" => $this->input->post('nick_name', true),
                "birth_date" => $this->input->post('birth_date', true),
                "mother_name" => $this->input->post('mother_name', true),
                "father_name" => $this->input->post('father_name', true),
                "class_name" => $this->input->post('class_name', true),
                "mother_contact" => $this->input->post('mother_contact', true),
                "father_contact" => $this->input->post('father_contact', true),
                "address" => $this->input->post('address', true),
                "school_grade" => $this->input->post('school_grade', true),
                "school_name" => $this->input->post('school_name', true),
                "blood_type" => $this->input->post('blood_type', true),
                "gender" => $this->input->post('gender', true),
                "father_job" => $this->input->post('father_job', true),
                "mother_job" => $this->input->post('mother_job', true),
                "hobby" => $this->input->post('hobby', true),
                "image" => $_FILES['image']['name']
            ];
        } else {
            $data = [
                "full_name" => $this->input->post('full_name', true),
                "nick_name" => $this->input->post('nick_name', true),
                "birth_date" => $this->input->post('birth_date', true),
                "mother_name" => $this->input->post('mother_name', true),
                "father_name" => $this->input->post('father_name', true),
                "class_name" => $this->input->post('class_name', true),
                "mother_contact" => $this->input->post('mother_contact', true),
                "father_contact" => $this->input->post('father_contact', true),
                "address" => $this->input->post('address', true),
                "school_grade" => $this->input->post('school_grade', true),
                "school_name" => $this->input->post('school_name', true),
                "blood_type" => $this->input->post('blood_type', true),
                "gender" => $this->input->post('gender', true),
                "father_job" => $this->input->post('father_job', true),
                "mother_job" => $this->input->post('mother_job', true),
                "hobby" => $this->input->post('hobby', true),
                "image" => 'default.jpg'

            ];
        }

        $this->db->insert('data_anak', $data);
    }
    public function tambahDataGuru()
    {
        $sermon = 0;
        $worship_leader = 0;
        $assistant = 0;
        $guitar = 0;
        $keyboard = 0;
        $cajon = 0;
        if ($this->input->post('sermon', true) == 1) {
            $sermon = 1;
        }
        if ($this->input->post('worship_leader', true) == 1) {
            $worship_leader = 1;
        }
        if ($this->input->post('assistant', true) == 1) {
            $assistant = 1;
        }
        if ($this->input->post('guitar', true) == 1) {
            $guitar = 1;
        }
        if ($this->input->post('keyboard', true) == 1) {
            $keyboard = 1;
        }
        if ($this->input->post('cajon', true) == 1) {
            $cajon = 1;
        }

        if ($_FILES['image']['name']) {
            $data = [
                "full_name" => $this->input->post('full_name', true),
                "nick_name" => $this->input->post('nick_name', true),
                "birth_date" => $this->input->post('birth_date', true),
                "join_date" => $this->input->post('join_date', true),
                "priority_class" => $this->input->post('priority_class', true),
                "blood_type" => $this->input->post('blood_type', true),
                "contact_number" => $this->input->post('contact_number', true),
                "address" => $this->input->post('address', true),
                "work_place" => $this->input->post('work_place', true),
                "gender" => $this->input->post('gender', true),
                "socmed" => $this->input->post('socmed', true),
                "is_active" => $this->input->post('is_active', true),
                "certification_level" => $this->input->post('certification_level', true),
                "sermon" => $sermon,
                "worship_leader" => $worship_leader,
                "assistant" => $assistant,
                "guitar" => $guitar,
                "keyboard" => $keyboard,
                "cajon" => $cajon,
                "image" => $_FILES['image']['name']
            ];
        } else {
            $data = [
                "full_name" => $this->input->post('full_name', true),
                "nick_name" => $this->input->post('nick_name', true),
                "birth_date" => $this->input->post('birth_date', true),
                "join_date" => $this->input->post('join_date', true),
                "priority_class" => $this->input->post('priority_class', true),
                "blood_type" => $this->input->post('blood_type', true),
                "contact_number" => $this->input->post('contact_number', true),
                "address" => $this->input->post('address', true),
                "work_place" => $this->input->post('work_place', true),
                "gender" => $this->input->post('gender', true),
                "socmed" => $this->input->post('socmed', true),
                "is_active" => $this->input->post('is_active', true),
                "certification_level" => $this->input->post('certification_level', true),
                "sermon" => $sermon,
                "worship_leader" => $worship_leader,
                "assistant" => $assistant,
                "guitar" => $guitar,
                "keyboard" => $keyboard,
                "cajon" => $cajon,
                "image" => 'default.jpg'
            ];
        }
        // $this->db->insert('data_guru', $data);
        try {
            $this->db->trans_start(FALSE);
            $this->db->insert('data_guru', $data);

            $this->db->trans_complete();
            $db_error = $this->db->error();
            if (!empty($db_error)) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return false; // unreachable retrun statement !!!
            }
        } catch (Exception $e) {
            log_message('error: ', $e->getMessage());
            return;
        }
    }
    public function hapusDataMahasiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mahasiswa');
    }
    public function getASMById($id)
    {
        return $this->db->get_where('data_anak', ['id' => $id])->row_array();
    }
    public function getGSMById($id)
    {
        return $this->db->get_where('data_guru', ['id_guru' => $id])->row_array();
    }

    public function ubahDataASM()
    {
        if ($_FILES['image']['name']) {
            $data = [
                "full_name" => $this->input->post('full_name', true),
                "nick_name" => $this->input->post('nick_name', true),
                "birth_date" => $this->input->post('birth_date', true),
                "mother_name" => $this->input->post('mother_name', true),
                "father_name" => $this->input->post('father_name', true),
                "class_name" => $this->input->post('class_name', true),
                "mother_contact" => $this->input->post('mother_contact', true),
                "father_contact" => $this->input->post('father_contact', true),
                "address" => $this->input->post('address', true),
                "school_grade" => $this->input->post('school_grade', true),
                "school_name" => $this->input->post('school_name', true),
                "blood_type" => $this->input->post('blood_type', true),
                "gender" => $this->input->post('gender', true),
                "father_job" => $this->input->post('father_job', true),
                "mother_job" => $this->input->post('mother_job', true),
                "hobby" => $this->input->post('hobby', true),
                "image" => $_FILES['image']['name']
            ];
        } else {
            $data = [
                "full_name" => $this->input->post('full_name', true),
                "nick_name" => $this->input->post('nick_name', true),
                "birth_date" => $this->input->post('birth_date', true),
                "mother_name" => $this->input->post('mother_name', true),
                "father_name" => $this->input->post('father_name', true),
                "class_name" => $this->input->post('class_name', true),
                "mother_contact" => $this->input->post('mother_contact', true),
                "father_contact" => $this->input->post('father_contact', true),
                "address" => $this->input->post('address', true),
                "school_grade" => $this->input->post('school_grade', true),
                "school_name" => $this->input->post('school_name', true),
                "blood_type" => $this->input->post('blood_type', true),
                "gender" => $this->input->post('gender', true),
                "father_job" => $this->input->post('father_job', true),
                "mother_job" => $this->input->post('mother_job', true),
                "hobby" => $this->input->post('hobby', true),
            ];
        }

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_anak', $data);
    }
    public function ubahDataGSM()
    {
        $sermon = 0;
        $worship_leader = 0;
        $assistant = 0;
        $guitar = 0;
        $keyboard = 0;
        $cajon = 0;
        if ($this->input->post('sermon', true) == 1) {
            $sermon = 1;
        }
        if ($this->input->post('worship_leader', true) == 1) {
            $worship_leader = 1;
        }
        if ($this->input->post('assistant', true) == 1) {
            $assistant = 1;
        }
        if ($this->input->post('guitar', true) == 1) {
            $guitar = 1;
        }
        if ($this->input->post('keyboard', true) == 1) {
            $keyboard = 1;
        }
        if ($this->input->post('cajon', true) == 1) {
            $cajon = 1;
        }

        if ($_FILES['image']['name']) {
            $data = [
                "full_name" => $this->input->post('full_name', true),
                "nick_name" => $this->input->post('nick_name', true),
                "birth_date" => $this->input->post('birth_date', true),
                "join_date" => $this->input->post('join_date', true),
                "priority_class" => $this->input->post('priority_class', true),
                "blood_type" => $this->input->post('blood_type', true),
                "contact_number" => $this->input->post('contact_number', true),
                "address" => $this->input->post('address', true),
                "work_place" => $this->input->post('work_place', true),
                "gender" => $this->input->post('gender', true),
                "socmed" => $this->input->post('socmed', true),
                "is_active" => $this->input->post('is_active', true),
                "certification_level" => $this->input->post('certification_level', true),
                "sermon" => $sermon,
                "worship_leader" => $worship_leader,
                "assistant" => $assistant,
                "guitar" => $guitar,
                "keyboard" => $keyboard,
                "cajon" => $cajon,
                "image" => $_FILES['image']['name']
            ];
        } else {
            $data = [
                "full_name" => $this->input->post('full_name', true),
                "nick_name" => $this->input->post('nick_name', true),
                "birth_date" => $this->input->post('birth_date', true),
                "join_date" => $this->input->post('join_date', true),
                "priority_class" => $this->input->post('priority_class', true),
                "blood_type" => $this->input->post('blood_type', true),
                "contact_number" => $this->input->post('contact_number', true),
                "address" => $this->input->post('address', true),
                "work_place" => $this->input->post('work_place', true),
                "gender" => $this->input->post('gender', true),
                "socmed" => $this->input->post('socmed', true),
                "is_active" => $this->input->post('is_active', true),
                "certification_level" => $this->input->post('certification_level', true),
                "sermon" => $sermon,
                "worship_leader" => $worship_leader,
                "assistant" => $assistant,
                "guitar" => $guitar,
                "keyboard" => $keyboard,
                "cajon" => $cajon,

            ];
        }


        $this->db->where('id_guru', $this->input->post('id_guru'));
        $this->db->update('data_guru', $data);
    }
    // public function cariDataMahasiswa()
    // {
    //     $keyword = $this->input->post('keyword', true);
    //     $this->db->like('nama', $keyword);
    //     $this->db->or_like('jurusan', $keyword);
    //     $this->db->or_like('email', $keyword);
    //     $this->db->or_like('nrp', $keyword);
    //     return $this->db->get('mahasiswa')->result_array();
    // }
    public function cariDataAnak()
    {
        $keyword = $this->input->post('keyword', true);

        $this->db->like('full_name', $keyword);
        $this->db->or_like('nick_name', $keyword);
        $this->db->or_like('class_name', ucwords($keyword));
        // $this->db->or_like('email', $keyword);
        // $this->db->or_like('nrp', $keyword);
        return $this->db->get('data_anak')->result_array();
    }
    public function cariDataGuru()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->order_by('id_guru', 'ASC');
        $this->db->like('full_name', $keyword);
        $this->db->or_like('nick_name', $keyword);
        // $this->db->or_like('email', $keyword);
        // $this->db->or_like('nrp', $keyword);
        return $this->db->get('data_guru')->result_array();
    }
    public function getChartKehadiran($id)
    {
        $this->db->order_by('id', 'ASC');
        $this->db->limit('5');
        return $this->db->get_where('absensi_asm', ['id_anak' => $id])->result_array();
    }
    public function getASMByClass($class_name = 'Anak Indria')
    {

        return $this->db->get_where('data_anak', ['class_name' => $class_name])->result_array();
    }
}
