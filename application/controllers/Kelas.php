<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

  public function index()
  {
    $data['konten'] = 'admin/kelas/index';

    $id_guru        = $this->session->id;
    $data['kelas']  = $this->ModelKelas->getByIdGuru($id_guru);

    $this->load->view('admin/template', $data);
  }

  public function create()
  {
    $data['konten'] = 'admin/kelas/create';

    $id_guru        = $this->session->id;
    $data['kelas']  = $this->ModelKelas->getByIdGuru($id_guru);

    $this->load->view('admin/template', $data);
  }

  public function store()
  {
    $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
    $this->form_validation->set_rules('tingkat_kelas', 'Tingkat Kelas', 'required');

    if ($this->form_validation->run() !== FALSE) {
      $nama_kelas     = $this->input->post('nama_kelas');
      $tingkat_kelas  = $this->input->post('tingkat_kelas');

      $this->ModelKelas->store($nama_kelas, $tingkat_kelas);

      $this->session->set_flashdata('sukses', 'Berhasil tambah kelas');

      redirect('admin/kelas');
    } else {
      $this->session->set_flashdata('error', validation_errors());

      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  public function siswa()
  {
    $data['konten']   = 'siswa/kelas/index';
    $data['dasar']    = $this->ModelKelas->getByTingkat('dasar');
    $data['lanjutan'] = $this->ModelKelas->getByTingkat('lanjutan');

    $this->load->view('siswa/template', $data);
  }

  public function showSiswa($id_kelas)
  {
    $kelas_siswa  = $this->db->get_where('kelas_siswa', [
      'siswa_id'  => $this->session->id,
      'kelas_id'  => $id_kelas
    ])->num_rows();

    if ($kelas_siswa <= 0) {
      $this->db->insert('kelas_siswa', [
        'siswa_id'  => $this->session->id,
        'kelas_id'  => $id_kelas
      ]);
    }

    if ($this->input->get()) {
      $id_siswa = $this->session->id;
      $progress = $this->db->get_where('progress_siswa', [
        'siswa_id'  => $id_siswa,
        'materi_id' => $this->input->get('id')
      ])->row_array();

      if (!$progress) {
        $this->ModelProgress->store($id_siswa, $this->input->get('id'));
      }
    }

    $data['konten'] = 'siswa/kelas/tampil';
    $data['materi'] = $this->ModelMateri->getByIdKelas($id_kelas);
    $data['kelas']  = $this->ModelKelas->getByIdKelas($id_kelas);
    $data['quizz'] = $this->ModelQuiz->checkQuiz($id_kelas, $this->session->id);
    $data['soal'] = $this->ModelQuiz->banyakSoal($id_kelas);

    // var_dump($data['soal']);
    // die();

    $this->load->view('siswa/template', $data);
  }

  public function attempt_quiz($id_kelas)
  {

    $data['konten'] = 'siswa/kelas/quiz';
    $data['materi'] = $this->ModelMateri->getByIdKelas($id_kelas);
    $data['kelas']  = $this->ModelKelas->getByIdKelas($id_kelas);
    $data['pilgan'] = ['A', 'B', 'C', 'D'];
    $data['soal'] = $this->ModelQuiz->getSoal($id_kelas);

    // var_dump($data['soal']);
    // die();

    $this->load->view('siswa/template', $data);
  }

  public function jawab_quiz()
  {

    $nilai = 0;
    $id_kelas = $this->input->post('id_kelas');
    $jmlh_soal = $this->input->post('jumlah_soal');
    for ($a = 1; $a <= $jmlh_soal; $a++) {
      $id_soal = $this->input->post('soal_' . $a);
      $jawaban = $this->input->post('jawaban_' . $a);

      $data = [
        'id_user' => $this->session->userdata('id'),
        'id_soal' => $id_soal,
        'jawaban' => $jawaban,
      ];


      $soal = $this->ModelQuiz->get_where($id_soal);

      // $stat = [];
      if ($jawaban == $soal['jawaban']) {

        $data += ["status" => 1];
        $nilai += 10;
      } else {
        $data += ["status" => 0];
        $nilai += 0;
      }

      // print_r($data);



      $this->db->insert('jawaban_quiz', $data);


      // echo "soal id " . $this->input->post('soal_' . $a) . " dia menjawab " . $this->input->post('jawaban_' . $a) . "<br>";
    }

    $data_nilai = [
      'id_kelas' => $id_kelas,
      'id_user' => $this->session->userdata('id'),
      'nilai' => $nilai
    ];
    $this->db->insert('nilai', $data_nilai);

    // echo "nilai kamu = " . $nilai;

    redirect('siswa/kelas/' . $id_kelas);
  }
}