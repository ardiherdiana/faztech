<?php
// application/controllers/Pekerjaan.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pekerjaan_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index() {
        // Public pekerjaan page
        $data['judul'] = 'Pekerjaan - FazTech';
        $data['pekerjaan'] = $this->Pekerjaan_model->ambil_semua_pekerjaan();
        $data['total_pekerjaan'] = count($data['pekerjaan']);
        
        // Status login user
        $data['sudah_login'] = $this->session->userdata('login') ? true : false;
        $data['nama_pengguna'] = $this->session->userdata('nama_lengkap');
        $data['peran_pengguna'] = $this->session->userdata('peran');
        
        $this->load->view('beranda/pekerjaan', $data);
    }

    public function admin() {
        $this->cek_admin();
        $data['judul'] = 'Kelola Pekerjaan - Admin';
        $data['pekerjaan'] = $this->Pekerjaan_model->ambil_semua_pekerjaan();
        
        $this->load->view('admin/pekerjaan/index', $data);
    }

    public function tambah() {
        $this->cek_admin();
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama', 'Nama Pekerjaan', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Konfigurasi upload
                $config['upload_path'] = './uploads/jobs/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;

                // Buat folder jika belum ada
                if (!is_dir('./uploads/jobs/')) {
                    mkdir('./uploads/jobs/', 0755, true);
                }

                $this->upload->initialize($config);

                $nama_foto = '';
                if ($this->upload->do_upload('foto')) {
                    $upload_data = $this->upload->data();
                    $nama_foto = $upload_data['file_name'];
                }

                $data = array(
                    'nama' => $this->input->post('nama'),
                    'foto' => $nama_foto
                );

                if ($this->Pekerjaan_model->tambah_pekerjaan($data)) {
                    $this->session->set_flashdata('sukses', 'Pekerjaan berhasil ditambahkan!');
                    redirect('admin/pekerjaan');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan pekerjaan!');
                }
            }
        }

        $data['judul'] = 'Tambah Pekerjaan - Admin';
        $this->load->view('admin/pekerjaan/tambah', $data);
    }

    public function edit($id) {
        $this->cek_admin();
        $pekerjaan = $this->Pekerjaan_model->ambil_pekerjaan_berdasarkan_id($id);
        if (!$pekerjaan) {
            show_404();
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama', 'Nama Pekerjaan', 'required');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './uploads/jobs/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;

                // Buat folder jika belum ada
                if (!is_dir('./uploads/jobs/')) {
                    mkdir('./uploads/jobs/', 0755, true);
                }

                $this->upload->initialize($config);

                $nama_foto = $pekerjaan->foto;
                if ($this->upload->do_upload('foto')) {
                    // Hapus foto lama
                    if ($pekerjaan->foto && file_exists('./uploads/jobs/' . $pekerjaan->foto)) {
                        unlink('./uploads/jobs/' . $pekerjaan->foto);
                    }
                    
                    $upload_data = $this->upload->data();
                    $nama_foto = $upload_data['file_name'];
                }

                $data = array(
                    'nama' => $this->input->post('nama'),
                    'foto' => $nama_foto
                );

                if ($this->Pekerjaan_model->perbarui_pekerjaan($id, $data)) {
                    $this->session->set_flashdata('sukses', 'Pekerjaan berhasil diperbarui!');
                    redirect('admin/pekerjaan');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui pekerjaan!');
                }
            }
        }

        $data['judul'] = 'Edit Pekerjaan - Admin';
        $data['pekerjaan'] = $pekerjaan;
        $this->load->view('admin/pekerjaan/edit', $data);
    }

    public function hapus($id) {
        $this->cek_admin();
        $pekerjaan = $this->Pekerjaan_model->ambil_pekerjaan_berdasarkan_id($id);
        if (!$pekerjaan) {
            show_404();
        }

        // Hapus foto jika ada
        if ($pekerjaan->foto && file_exists('./uploads/jobs/' . $pekerjaan->foto)) {
            unlink('./uploads/jobs/' . $pekerjaan->foto);
        }

        if ($this->Pekerjaan_model->hapus_pekerjaan($id)) {
            $this->session->set_flashdata('sukses', 'Pekerjaan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pekerjaan!');
        }
        redirect('admin/pekerjaan');
    }

    private function cek_admin() {
        if (!$this->session->userdata('login')) {
            redirect('auth/masuk');
        }
        if ($this->session->userdata('peran') != 'admin') {
            redirect('beranda');
        }
    }
} 