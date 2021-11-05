<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKelas extends CI_Model
{

  public function getByIdGuru($id_guru)
  {
    $data = $this->db->get_where('kelas', ['guru_id' => $id_guru])->result_array();

    for ($i = 0; $i < count($data); $i++) {
      $key    = $data[$i];
      $materi = $this->db->get_where('materi', [
        'kelas_id'    => $key['id'],
        'keterangan'  => 'materi'
      ])->result_array();

      $total_progress = 0;
      for ($j = 0; $j < count($materi); $j++) {
        $value    = $materi[$j];
        $progress = $this->db->get_where('progress_siswa', ['materi_id' => $value['id']])->num_rows();

        $total_progress += $progress;
      }

      $quiz = $this->db->get_where('materi', [
        'kelas_id'    => $key['id'],
        'keterangan'  => 'quiz'
      ])->result_array();

      $peserta  = $this->db->get_where('kelas_siswa', ['kelas_id' => $key['id']])->result_array();

      $data[$i]['jumlah_materi']    = count($materi);
      $data[$i]['jumlah_quiz']      = count($quiz);
      $data[$i]['jumlah_peserta']   = count($peserta);
      $data[$i]['jumlah_progress']  = $total_progress;
      $data[$i]['completion']       = $total_progress / (count($materi) == 0 ? 1 : count($materi)) * 100;
    }

    return $data;
  }

  public function getByIdKelas($id_kelas)
  {
    $data = $this->db->get_where('kelas', ['id' => $id_kelas])->row_array();

    $materi           = $this->db->get_where('materi', ['kelas_id' => $id_kelas])->result_array();
    $totalKelasSiswa  = $this->db->get_where('kelas_siswa', ['kelas_id' => $id_kelas])->num_rows();

    for ($i = 0; $i < count($materi); $i++) {
      $key  = $materi[$i];
      $progress = $this->db->get_where('progress_siswa', ['materi_id' => $key['id']])->result_array();

      $materi[$i]['completion'] = round(count($progress) / $totalKelasSiswa * 100, 2);
    }

    $data['materi'] = $materi;

    return $data;
  }

  public function store($nama_kelas, $tingkat_kelas)
  {
    $this->db->insert('kelas', [
      'nama_kelas'    => $nama_kelas,
      'tingkat_kelas' => $tingkat_kelas
    ]);
  }

  public function getByIdSiswa($id_siswa)
  {
    $this->db->join('kelas', 'kelas_siswa.kelas_id = kelas.id');
    $data = $this->db->get_where('kelas_siswa', ['siswa_id' => $id_siswa])->result_array();

    for ($i = 0; $i < count($data); $i++) {
      $key    = $data[$i];

      $materi = $this->db->get_where('materi', ['kelas_id' => $key['kelas_id']])->result_array();

      $total_progress = 0;
      for ($j = 0; $j < count($materi); $j++) {
        $value    = $materi[$j];
        $progress = $this->db->get_where('progress_siswa', [
          'materi_id' => $value['id'],
          'siswa_id'  => $id_siswa
        ])->num_rows();

        $total_progress += $progress;
      }


      $data[$i]['completion'] = $total_progress / (count($materi) == 0 ? 1 : count($materi)) * 100;
    }

    return $data;
  }

  public function getByTingkat($tingkat)
  {
    return $this->db->get_where('kelas', ['tingkat_kelas' => $tingkat])->result_array();
  }

  public function getSoalByKelas($id_kelas)
  {
    return $this->db->get_where('bank_soal', ['id_kelas' => $id_kelas])->result_array();
  }

  public function get_all($table)
  {
    return $this->db->get($table)->result_array();
  }
}