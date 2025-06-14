<?php
// application/controllers/Testimoni.php (LENGKAP)
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Testimoni_model');
    }

    public function index() {
        // Public testimoni page
        $data['judul'] = 'Testimoni - FazTech';
        $data['testimoni'] = $this->Testimoni_model->ambil_semua_testimoni();
        $data['total_testimoni'] = $this->Testimoni_model->hitung_total_testimoni();
        
        // Status login user
        $data['sudah_login'] = $this->session->userdata('login') ? true : false;
        $data['nama_pengguna'] = $this->session->userdata('nama_lengkap');
        $data['peran_pengguna'] = $this->session->userdata('peran');
        
        $this->load->view('beranda/testimoni', $data);
    }

    public function admin() {
        $this->cek_admin();
        $data['judul'] = 'Kelola Testimoni - Admin';
        $data['testimoni'] = $this->Testimoni_model->ambil_semua_testimoni();
        
        $this->load->view('admin/testimoni/index', $data);
    }

    public function tambah() {
        $this->cek_admin();
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|min_length[3]');
            $this->form_validation->set_rules('rating', 'Rating', 'required|in_list[1,2,3,4,5]');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[10]');

            if ($this->form_validation->run() == TRUE) {
                // Konfigurasi upload
                $config['upload_path'] = './uploads/testimonials/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048; // 2MB
                $config['encrypt_name'] = TRUE;

                // Pastikan folder exists
                if (!is_dir($config['upload_path'])) {
                    mkdir($config['upload_path'], 0755, true);
                }

                $this->upload->initialize($config);

                $nama_gambar = '';
                if (!empty($_FILES['gambar']['name'])) {
                    if ($this->upload->do_upload('gambar')) {
                        $upload_data = $this->upload->data();
                        $nama_gambar = $upload_data['file_name'];
                    } else {
                        $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $this->upload->display_errors());
                        redirect('testimoni/tambah');
                        return;
                    }
                }

                $data = array(
                    'nama' => $this->input->post('nama'),
                    'jabatan' => $this->input->post('jabatan'),
                    'rating' => $this->input->post('rating'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $nama_gambar
                );

                if ($this->Testimoni_model->tambah_testimoni($data)) {
                    $this->session->set_flashdata('sukses', 'Testimoni berhasil ditambahkan!');
                    redirect('admin/testimoni');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan testimoni!');
                }
            }
        }

        $data['judul'] = 'Tambah Testimoni - Admin';
        $this->load->view('admin/testimoni/tambah', $data);
    }

    public function edit($id) {
        $this->cek_admin();
        $testimoni = $this->Testimoni_model->ambil_testimoni_berdasarkan_id($id);
        if (!$testimoni) {
            show_404();
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|min_length[3]');
            $this->form_validation->set_rules('rating', 'Rating', 'required|in_list[1,2,3,4,5]');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[10]');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './uploads/testimonials/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048; // 2MB
                $config['encrypt_name'] = TRUE;

                // Pastikan folder exists
                if (!is_dir($config['upload_path'])) {
                    mkdir($config['upload_path'], 0755, true);
                }

                $this->upload->initialize($config);

                $nama_gambar = $testimoni->gambar; // Keep existing image
                
                // Check if new image uploaded
                if (!empty($_FILES['gambar']['name'])) {
                    if ($this->upload->do_upload('gambar')) {
                        // Delete old image if exists
                        if ($testimoni->gambar && file_exists('./uploads/testimonials/' . $testimoni->gambar)) {
                            unlink('./uploads/testimonials/' . $testimoni->gambar);
                        }
                        
                        $upload_data = $this->upload->data();
                        $nama_gambar = $upload_data['file_name'];
                    } else {
                        $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $this->upload->display_errors());
                        redirect('testimoni/edit/' . $id);
                        return;
                    }
                }

                $data = array(
                    'nama' => $this->input->post('nama'),
                    'jabatan' => $this->input->post('jabatan'),
                    'rating' => $this->input->post('rating'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $nama_gambar
                );

                if ($this->Testimoni_model->perbarui_testimoni($id, $data)) {
                    $this->session->set_flashdata('sukses', 'Testimoni berhasil diperbarui!');
                    redirect('admin/testimoni');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui testimoni!');
                }
            }
        }

        $data['judul'] = 'Edit Testimoni - Admin';
        $data['testimoni'] = $testimoni;
        $this->load->view('admin/testimoni/edit', $data);
    }

    public function hapus($id) {
        $this->cek_admin();
        $testimoni = $this->Testimoni_model->ambil_testimoni_berdasarkan_id($id);
        if (!$testimoni) {
            $this->session->set_flashdata('error', 'Testimoni tidak ditemukan!');
            redirect('testimoni');
            return;
        }

        // Hapus gambar jika ada
        if ($testimoni->gambar && file_exists('./uploads/testimonials/' . $testimoni->gambar)) {
            unlink('./uploads/testimonials/' . $testimoni->gambar);
        }

        if ($this->Testimoni_model->hapus_testimoni($id)) {
            $this->session->set_flashdata('sukses', 'Testimoni berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus testimoni!');
        }
        redirect('admin/testimoni');
    }

    public function detail($id) {
        $testimoni = $this->Testimoni_model->ambil_testimoni_berdasarkan_id($id);
        if (!$testimoni) {
            show_404();
        }

        $data['judul'] = 'Detail Testimoni - Admin';
        $data['testimoni'] = $testimoni;
        $this->load->view('admin/testimoni/detail', $data);
    }

    private function cek_admin() {
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu!');
            redirect('auth/masuk');
        }
        if ($this->session->userdata('peran') != 'admin') {
            $this->session->set_flashdata('error', 'Akses ditolak! Hanya admin yang diizinkan.');
            redirect('beranda');
        }
    }
}