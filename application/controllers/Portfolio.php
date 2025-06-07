<?php
// application/controllers/Portfolio.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Portfolio_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index() {
        // Public portfolio page
        $data['judul'] = 'Portfolio - FazTech';
        $data['portfolio'] = $this->Portfolio_model->ambil_semua_portfolio();
        $data['total_portfolio'] = count($data['portfolio']);
        
        // Status login user
        $data['sudah_login'] = $this->session->userdata('login') ? true : false;
        $data['nama_pengguna'] = $this->session->userdata('nama_lengkap');
        $data['peran_pengguna'] = $this->session->userdata('peran');
        
        $this->load->view('beranda/portfolio', $data);
    }

    public function admin() {
        $this->cek_admin();
        $data['judul'] = 'Kelola Portfolio - Admin';
        $data['portfolio'] = $this->Portfolio_model->ambil_semua_portfolio();
        
        $this->load->view('admin/portfolio/index', $data);
    }

    public function tambah() {
        $this->cek_admin();
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama', 'Nama Portfolio', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Konfigurasi upload
                $config['upload_path'] = './uploads/portfolio/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;

                // Buat folder jika belum ada
                if (!is_dir('./uploads/portfolio/')) {
                    mkdir('./uploads/portfolio/', 0755, true);
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

                if ($this->Portfolio_model->tambah_portfolio($data)) {
                    $this->session->set_flashdata('sukses', 'Portfolio berhasil ditambahkan!');
                    redirect('admin/portfolio');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan portfolio!');
                }
            }
        }

        $data['judul'] = 'Tambah Portfolio - Admin';
        $this->load->view('admin/portfolio/tambah', $data);
    }

    public function edit($id) {
        $this->cek_admin();
        $portfolio = $this->Portfolio_model->ambil_portfolio_berdasarkan_id($id);
        if (!$portfolio) {
            show_404();
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama', 'Nama Portfolio', 'required');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './uploads/portfolio/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;

                // Buat folder jika belum ada
                if (!is_dir('./uploads/portfolio/')) {
                    mkdir('./uploads/portfolio/', 0755, true);
                }

                $this->upload->initialize($config);

                $nama_foto = $portfolio->foto;
                if ($this->upload->do_upload('foto')) {
                    // Hapus foto lama
                    if ($portfolio->foto && file_exists('./uploads/portfolio/' . $portfolio->foto)) {
                        unlink('./uploads/portfolio/' . $portfolio->foto);
                    }
                    
                    $upload_data = $this->upload->data();
                    $nama_foto = $upload_data['file_name'];
                }

                $data = array(
                    'nama' => $this->input->post('nama'),
                    'foto' => $nama_foto
                );

                if ($this->Portfolio_model->perbarui_portfolio($id, $data)) {
                    $this->session->set_flashdata('sukses', 'Portfolio berhasil diperbarui!');
                    redirect('admin/portfolio');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui portfolio!');
                }
            }
        }

        $data['judul'] = 'Edit Portfolio - Admin';
        $data['portfolio'] = $portfolio;
        $this->load->view('admin/portfolio/edit', $data);
    }

    public function hapus($id) {
        $this->cek_admin();
        $portfolio = $this->Portfolio_model->ambil_portfolio_berdasarkan_id($id);
        if (!$portfolio) {
            show_404();
        }

        // Hapus foto jika ada
        if ($portfolio->foto && file_exists('./uploads/portfolio/' . $portfolio->foto)) {
            unlink('./uploads/portfolio/' . $portfolio->foto);
        }

        if ($this->Portfolio_model->hapus_portfolio($id)) {
            $this->session->set_flashdata('sukses', 'Portfolio berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus portfolio!');
        }
        redirect('admin/portfolio');
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