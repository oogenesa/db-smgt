<?php

class Admin_model extends CI_model
{
    public function getNewUser()
    {
        return $this->db->get_where('users', ['is_active' => 0])->result_array();
    }
    public function changeUserActive($id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', ['is_active' => 1]);
    }
    public function getGSMByService($service)
    {

        return $this->db->get_where('data_guru', [$service => 1])->result_array();
    }
    public function tambahSchedule()
    {
        $data_ai = [
            "date_kegiatan" => $this->input->post('date_kegiatan', true),
            "class_name" => "Anak Indria",
            "kegiatan" => $this->input->post('kegiatan', true),
            "theology_mentor" => $this->input->post('theology_mentor', true),
            "id_guru_sermon" => $this->input->post('sermon_ai', true),
            "id_guru_worship_leader" => $this->input->post('worship_leader_ai', true),
            "id_guru_guitar" => $this->input->post('guitar_ai', true),
            "id_guru_assistant" => $this->input->post('assistant_ai', true),
            "theme" => $this->input->post('theme_ai', true)
        ];
        $this->db->insert('schedule_gsm', $data_ai);
        $data_ak = [
            "date_kegiatan" => $this->input->post('date_kegiatan', true),
            "class_name" => "Anak Kecil",
            "kegiatan" => $this->input->post('kegiatan', true),
            "theology_mentor" => $this->input->post('theology_mentor', true),
            "id_guru_sermon" => $this->input->post('sermon_ak', true),
            "id_guru_worship_leader" => $this->input->post('worship_leader_ak', true),
            "id_guru_guitar" => $this->input->post('guitar_ak', true),
            "id_guru_assistant" => $this->input->post('assistant_ak', true),
            "theme" => $this->input->post('theme_ai', true)
        ];
        $this->db->insert('schedule_gsm', $data_ak);
        $data_ab = [
            "date_kegiatan" => $this->input->post('date_kegiatan', true),
            "class_name" => "Anak Besar",
            "kegiatan" => $this->input->post('kegiatan', true),
            "theology_mentor" => $this->input->post('theology_mentor', true),
            "id_guru_sermon" => $this->input->post('sermon_ab', true),
            "id_guru_worship_leader" => $this->input->post('worship_leader_ab', true),
            "id_guru_guitar" => $this->input->post('guitar_ab', true),
            "id_guru_assistant" => $this->input->post('assistant_ab', true),
            "theme" => $this->input->post('theme_ab', true)
        ];
        $this->db->insert('schedule_gsm', $data_ab);
        $data_ar = [
            "date_kegiatan" => $this->input->post('date_kegiatan', true),
            "class_name" => "Anak Remaja",
            "kegiatan" => $this->input->post('kegiatan', true),
            "theology_mentor" => $this->input->post('theology_mentor', true),
            "id_guru_sermon" => $this->input->post('sermon_ar', true),
            "id_guru_worship_leader" => $this->input->post('worship_leader_ar', true),
            "id_guru_guitar" => $this->input->post('guitar_ar', true),
            "id_guru_assistant" => $this->input->post('assistant_ar', true),
            "theme" => $this->input->post('theme_ab', true)
        ];
        $this->db->insert('schedule_gsm', $data_ar);
    }
    public function startInisiasi()
    {
        $query = "Select id, full_name, school_grade from data_anak where school_grade !=0";
        // $this->db->where('school_grade', '!=0');
        // $tes = $this->db->get('data_anak')->result_array();
        $tes = $this->db->query($query)->result_array();
        foreach ($tes as $t) {
            $this->db->set('school_grade', $t['school_grade'] + 1);
            if ($t['school_grade'] == 3) {
                $this->db->set('class_name', 'Anak Besar');
            } else if ($t['school_grade'] == 6) {
                $this->db->set('class_name', 'Anak Remaja');
            } else if ($t['school_grade'] == 9) {
                $this->db->set('class_name', 'PPGT');
            }

            $this->db->where('id', $t['id']);
            $this->db->update('data_anak');
        }
        // var_dump($tes);
        // die;
    }
    public function tambahPersembahan()
    {

        $cek = $this->db->get_where('persembahan', [
            'date_kegiatan' => $this->input->post('date_kegiatan', true),
            "class_name" => $this->input->post('class_name', true)
        ])->num_rows();

        if ($_FILES['image']['name']) {
            $data = [
                "date_kegiatan" => $this->input->post('date_kegiatan', true),
                "class_name" => $this->input->post('class_name', true),
                "pundi1" => str_replace(',', '', $this->input->post('pundi_1', true)),
                "pundi2" =>  str_replace(',', '', $this->input->post('pundi_2', true)),
                'admitor' => $this->input->post('name'),
                "image" => $_FILES['image']['name']
            ];
        } else {
            $data = [
                "date_kegiatan" => $this->input->post('date_kegiatan', true),
                "class_name" => $this->input->post('class_name', true),
                "pundi1" => $this->input->post('pundi_1', true),
                "pundi2" => $this->input->post('pundi_2', true),
                'admitor' => $this->input->post('name'),
                "image" => 'default.jpg'
            ];
        }
        //$this->db->insert('persembahan', $data);
        if ($cek == 0) {
            $this->db->insert('persembahan', $data);
            return true;
        } else {
            return false;
        }
    }
}
