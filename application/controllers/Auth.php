<?php
// application/controllers/Auth.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        // Jika belum login, redirect ke landing page
        if (!$this->session->userdata('login')) {
            redirect('beranda');
        }
        
        // Jika sudah login, redirect sesuai peran
        if ($this->session->userdata('peran') == 'admin') {
            redirect('admin');
        } else {
            redirect('beranda');
        }
    }

    public function masuk() {
        // Jika sudah login, redirect
        if ($this->session->userdata('login')) {
            if ($this->session->userdata('peran') == 'admin') {
                redirect('admin');
            } else {
                redirect('beranda');
            }
        }

        // Proses login
        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required');

            if ($this->form_validation->run() == TRUE) {
                $email = $this->input->post('email');
                $kata_sandi = $this->input->post('kata_sandi');

                $pengguna = $this->User_model->cek_email($email);

                if ($pengguna && password_verify($kata_sandi, $pengguna->kata_sandi)) {
                    // Set session
                    $session_data = array(
                        'user_id' => $pengguna->id,
                        'nama_lengkap' => $pengguna->nama_lengkap,
                        'email' => $pengguna->email,
                        'peran' => $pengguna->peran,
                        'login' => TRUE
                    );
                    $this->session->set_userdata($session_data);

                    // Redirect berdasarkan peran
                    if ($pengguna->peran == 'admin') {
                        $this->session->set_flashdata('sukses', 'Selamat datang Admin!');
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('sukses', 'Login berhasil!');
                        redirect('beranda');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Email atau kata sandi salah!');
                }
            }
        }

        $data['judul'] = 'Masuk - FazTech';
        $this->load->view('auth/masuk', $data);
    }

    public function daftar() {
        // Jika sudah login, redirect
        if ($this->session->userdata('login')) {
            redirect('beranda');
        }

        // Proses pendaftaran
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|min_length[3]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required|min_length[6]');
            $this->form_validation->set_rules('konfirmasi_kata_sandi', 'Konfirmasi Kata Sandi', 'required|matches[kata_sandi]');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'nama_lengkap' => $this->input->post('nama_lengkap'),
                    'email' => $this->input->post('email'),
                    'kata_sandi' => password_hash($this->input->post('kata_sandi'), PASSWORD_DEFAULT),
                    'peran' => 'user'
                );

                if ($this->User_model->daftar($data)) {
                    $this->session->set_flashdata('sukses', 'Pendaftaran berhasil! Silakan masuk.');
                    redirect('auth/masuk');
                } else {
                    $this->session->set_flashdata('error', 'Pendaftaran gagal!');
                }
            }
        }

        $data['judul'] = 'Daftar - FazTech';
        $this->load->view('auth/daftar', $data);
    }

    public function keluar() {
        $this->session->unset_userdata(array('user_id', 'nama_lengkap', 'email', 'peran', 'login'));
        $this->session->sess_destroy();
        $this->session->set_flashdata('sukses', 'Anda telah keluar.');
        redirect('beranda');
    }

    // Helper method untuk cek login
    private function cek_login() {
        if (!$this->session->userdata('login')) {
            redirect('auth/masuk');
        }
    }

    // Helper method untuk cek admin
    private function cek_admin() {
        $this->cek_login();
        if ($this->session->userdata('peran') != 'admin') {
            redirect('beranda');
        }
    }
}