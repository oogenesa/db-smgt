<?php

class Feature_model extends CI_model
{
    public function tambahnote()
    {
        $data = [
            'user_name' => $this->input->post('name'),
            'note_text' => $this->input->post('note_text'),
            'date_created' => date("Y-m-d"),
            'date_to_complete' => $this->input->post('date_to_complete'),
            'level' => 1,
            'id_main_note' => 0,
            'priority' => 1,
            'show' => 1
        ];

        $this->db->insert('note', $data);
    }
    public function getjumlahasm()
    {
        $jumlah = [
            $this->db->get_where('data_anak', ['class_name' => 'Anak Indria'])->num_rows(),
            $this->db->get_where('data_anak', ['class_name' => 'Anak Kecil'])->num_rows(),
            $this->db->get_where('data_anak', ['class_name' => 'Anak Besar'])->num_rows(),
            $this->db->get_where('data_anak', ['class_name' => 'Anak Remaja'])->num_rows()
        ];
        return $jumlah;
    }
    public function getjumlahgsm()
    {
        $jumlah = [
            $this->db->get_where('data_guru', ['sermon' => '1'])->num_rows(),
            $this->db->get_where('data_guru', ['worship_leader' => '1'])->num_rows(),
            $this->db->get_where('data_guru', ['assistant' => '1'])->num_rows(),
            $this->db->get_where('data_guru', ['guitar' => '1'])->num_rows(),
            $this->db->get_where('data_guru', ['keyboard' => '1'])->num_rows(),
            $this->db->get_where('data_guru', ['cajon' => '1'])->num_rows()
        ];
        return $jumlah;
    }
    public function getASMByClass($class_name = 'Anak Indria')
    {

        return $this->db->get_where('data_anak', ['class_name' => $class_name])->result_array();
    }
    public function getGSMByService($service)
    {

        return $this->db->get_where('data_guru', [$service => 1])->result_array();
    }
    public function inputAbsensi()
    {
        $val = true;
        $tes = json_decode($this->input->post('objectjson'));
        foreach ($tes as $t) {
            $kehadiran = 0;
            if ($t->kehadiran == true) {
                $kehadiran = 1;
            }
            $this->db->insert('absensi_asm', [
                'id_anak' => $t->id,
                'date_absensi' => $t->date_absensi,
                'class_name' => $t->class_name_param,
                'alasan' => $t->alasan,
                'sermon' => $t->sermon,
                'worship_leader' => $t->worship_leader,
                'guitar' => $t->guitar,
                'kegiatan' => $t->kegiatan,
                'kehadiran' => $kehadiran
            ]);
            if ($val) {
                $this->db->insert('absensi_gsm', [
                    'id_guru' => $t->guitar,
                    'date_absensi' => $t->date_absensi,
                    'kegiatan' => $t->kegiatan,
                    'class_name' => $t->class_name_param,
                    'service' => 'guitar'
                ]);
                $this->db->insert('absensi_gsm', [
                    'id_guru' => $t->worship_leader,
                    'date_absensi' => $t->date_absensi,
                    'kegiatan' => $t->kegiatan,
                    'class_name' => $t->class_name_param,
                    'service' => 'worship_leader'
                ]);
                $this->db->insert('absensi_gsm', [
                    'id_guru' => $t->sermon,
                    'date_absensi' => $t->date_absensi,
                    'kegiatan' => $t->kegiatan,
                    'class_name' => $t->class_name_param,
                    'service' => 'sermon'
                ]);
                $val = false;
            }
        }
    }
    public function getAbsensiASM($class_name, $date_absensi)
    {
        $this->db->select('absensi_asm.id_anak, absensi_asm.class_name, absensi_asm.alasan, absensi_asm.kehadiran, absensi_asm.kegiatan, data_anak.full_name, data_anak.image');
        $this->db->from('absensi_asm');
        $this->db->join('data_anak', 'data_anak.id = absensi_asm.id_anak', 'left');
        $this->db->where('absensi_asm.class_name', $class_name);
        $this->db->where('absensi_asm.date_absensi', $date_absensi);

        return $this->db->get()->result_array();
    }
    public function getScheduleByMonth($month, $year)
    {
        // $this->db->select('DISTINCT(date_kegiatan), id');
        $i = 0;
        $object = [];
        $this->db->distinct('date_kegiatan');
        $this->db->select('date_kegiatan');
        $this->db->order_by('date_kegiatan', 'ASC');

        // $this->db->where('EXTRACT(MONTH FROM date_kegiatan)', $month);
        // $this->db->where('EXTRACT(YEAR FROM date_kegiatan)', $year);
        $tes = $this->db->get_where('schedule_gsm', [
            'EXTRACT(MONTH FROM date_kegiatan) =' => $month,
            'EXTRACT(YEAR FROM date_kegiatan) = ' => $year
        ])->result_array();

        foreach ($tes as $t) {
            $this->db->select('schedule_gsm.id, schedule_gsm.class_name, schedule_gsm.kegiatan, schedule_gsm.theme, schedule_gsm.theology_mentor, schedule_gsm.id_guru_sermon, schedule_gsm.id_guru_worship_leader, schedule_gsm.id_guru_guitar, A.nick_name as name_sermon,  B.nick_name as name_worship_leader,  C.nick_name as name_guitar');
            //$this->db->from('schedule_gsm');
            $this->db->join('data_guru as A', 'A.id_guru = schedule_gsm.id_guru_sermon', 'left');
            $this->db->join('data_guru as B', 'B.id_guru = schedule_gsm.id_guru_worship_leader', 'left');
            $this->db->join('data_guru as C', 'C.id_guru = schedule_gsm.id_guru_guitar', 'left');
            $this->db->order_by('id', 'ASC');
            $data = $this->db->get_where('schedule_gsm', ['date_kegiatan' => $t['date_kegiatan']])->result_array();
            array_push($t, ['data' => $data]);
            //var_dump($t);
            array_push($object,  $t);
        }
        // var_dump($object[0][0][0]['name_sermon']);
        // die;
        // var_dump($object);
        // die;
        return $object;
        //         $query = "SELECT user_sub_menu.* , user_menu.menu
        //         FROM user_sub_menu JOIN user_menu
        //         ON user_sub_menu.menu_id = user_menu.id";
        //   return $this->db->query($query)->result_array();
    }
    public function getBirthdayASM()
    {
        $query = "SELECT * FROM data_anak 
        WHERE 
            indexable_month_day(birth_date) >= indexable_month_day(CURRENT_DATE)
        and
            indexable_month_day(birth_date) <= indexable_month_day(CURRENT_DATE+7);";
        return $this->db->query($query)->result_array();
    }
    public function getBirthdayGSM()
    {
        $query = "SELECT * FROM data_guru 
        WHERE 
            indexable_month_day(birth_date) >= indexable_month_day(CURRENT_DATE)
        and
            indexable_month_day(birth_date) <= indexable_month_day(CURRENT_DATE+7);";
        return $this->db->query($query)->result_array();
    }
}
