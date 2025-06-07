<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->cek_admin();
        $this->load->model('Kontak_model');
    }

    public function index() {
        // Redirect to admin if accessing directly
        redirect('admin/kontak');
    }

    public function admin() {
        $data['judul'] = 'Kelola Kontak - Admin';
        $data['kontak'] = $this->Kontak_model->ambil_semua_kontak();
        
        $this->load->view('admin/kontak/index', $data);
    }

    public function detail($id) {
        $data['judul'] = 'Detail Kontak - Admin';
        $data['kontak'] = $this->Kontak_model->ambil_kontak_berdasarkan_id($id);
        
        if (!$data['kontak']) {
            $this->session->set_flashdata('error', 'Kontak tidak ditemukan!');
            redirect('admin/kontak');
        }
        
        $this->load->view('admin/kontak/detail', $data);
    }

    public function hapus($id) {
        $kontak = $this->Kontak_model->ambil_kontak_berdasarkan_id($id);
        
        if (!$kontak) {
            $this->session->set_flashdata('error', 'Kontak tidak ditemukan!');
            redirect('admin/kontak');
        }

        if ($this->Kontak_model->hapus_kontak($id)) {
            $this->session->set_flashdata('sukses', 'Kontak berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus kontak!');
        }
        redirect('admin/kontak');
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