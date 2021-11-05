<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{

    public function index()
    {
        $data['konten'] = 'admin/quiz/create';

        $id_guru        = $this->session->id;
        $data['kelas']  = $this->ModelKelas->getByIdGuru($id_guru);

        $this->load->view('admin/template', $data);
    }

    public function post()
    {
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('pilihan_a', 'Pilihan A', 'required');
        $this->form_validation->set_rules('pilihan_b', 'Pilihan B', 'required');
        $this->form_validation->set_rules('pilihan_c', 'Pilihan C', 'required');
        $this->form_validation->set_rules('pilihan_d', 'Pilihan D', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban ', 'required');

        if ($this->form_validation->run() !== FALSE) {

            $data = [
                'id_kelas' => $this->input->post('kelas'),
                'pertanyaan' => $this->input->post('pertanyaan'),
                'pilihan_a' => $this->input->post('pilihan_a'),
                'pilihan_b' => $this->input->post('pilihan_b'),
                'pilihan_c' => $this->input->post('pilihan_c'),
                'pilihan_d' => $this->input->post('pilihan_d'),
                'jawaban' => $this->input->post('jawaban'),
            ];

            // $judul_materi = $this->input->post('judul_materi');
            // $keterangan   = $this->input->post('keterangan');
            // $kelas        = $this->input->post('kelas');
            // $tingkat      = $this->input->post('tingkat');
            // $isi_materi   = $this->input->post('isi_materi');
            // $file         = $this->uploadFile();

            $this->db->insert('bank_soal', $data);

            $this->session->set_flashdata('sukses', 'Berhasil tambah Soal');
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function hapus($id)
    {

        $this->db->where('id_soal', $id);
        $this->db->delete('bank_soal');

        $this->session->set_flashdata('sukses_hapus', 'Berhasil hapus Soal');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update_soal()
    {


        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('pilihan_a', 'Pilihan A', 'required');
        $this->form_validation->set_rules('pilihan_b', 'Pilihan B', 'required');
        $this->form_validation->set_rules('pilihan_c', 'Pilihan C', 'required');
        $this->form_validation->set_rules('pilihan_d', 'Pilihan D', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban ', 'required');

        if ($this->form_validation->run() !== FALSE) {
            $data = [
                'id_kelas' => $this->input->post('id_kelas'),
                'id_soal' => $this->input->post('id_soal'),
                'pertanyaan' => $this->input->post('pertanyaan'),
                'pilihan_a' => $this->input->post('pilihan_a'),
                'pilihan_b' => $this->input->post('pilihan_b'),
                'pilihan_c' => $this->input->post('pilihan_c'),
                'pilihan_d' => $this->input->post('pilihan_d'),
                'jawaban' => $this->input->post('jawaban'),
            ];

            $this->db->where('id_soal', $data['id_soal']);
            $this->db->update('bank_soal', $data);

            $this->session->set_flashdata('sukses_hapus', 'Berhasil perbaharui Soal');
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }
        redirect($_SERVER['HTTP_REFERER']);

        // var_dump($data);
        // die();
    }

    // public function create()
    // {
    //     $data['konten'] = 'admin/materi/create';

    //     $id_guru        = $this->session->id;
    //     $data['kelas']  = $this->ModelKelas->getByIdGuru($id_guru);

    //     $this->load->view('admin/template', $data);
    // }
}