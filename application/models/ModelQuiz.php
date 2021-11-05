<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelQuiz extends CI_Model
{
    public function getSoal($kelas)
    {
        $query = "SELECT * FROM bank_soal WHERE id_kelas = $kelas ORDER BY RAND() LIMIT 10";

        return $this->db->query($query)->result_array();
    }

    public function get_where($id)
    {
        return $this->db->get_where('bank_soal', ['id_soal' => $id])->row_array();
    }

    public function checkQuiz($idkelas, $idsiswa)
    {
        $data = [
            'id_kelas' => $idkelas,
            'id_user' => $idsiswa
        ];

        $this->db->limit(1);
        $this->db->order_by('id_nilai', 'DESC');

        return $this->db->get_where('nilai', $data)->row_array();
    }

    public function banyakSoal($kelas)
    {
        $query = "SELECT count(*) as jml FROM bank_soal WHERE id_kelas = $kelas";

        return $this->db->query($query)->row_array();
    }
}