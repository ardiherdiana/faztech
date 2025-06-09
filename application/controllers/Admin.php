<?php
// application/controllers/Admin.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->cek_admin();
        $this->load->model('Produk_model');
        $this->load->model('Testimoni_model');
        $this->load->model('Kontak_model');
        $this->load->model('Pekerjaan_model');
        $this->load->model('User_model');
    }

    public function index() {
        $data['judul'] = 'Dashboard Admin - FazTech';
        $data['total_produk'] = $this->Produk_model->hitung_total_produk();
        $data['total_testimoni'] = $this->Testimoni_model->hitung_total_testimoni();
        $data['total_kontak'] = $this->Kontak_model->hitung_total_kontak();
        $data['total_pekerjaan'] = $this->Pekerjaan_model->hitung_total_pekerjaan();
        $data['produk_terbaru'] = $this->Produk_model->ambil_semua_produk();
        $data['testimoni_terbaru'] = $this->Testimoni_model->ambil_testimoni_terbaru(5);
        $data['kontak_terbaru'] = $this->Kontak_model->ambil_semua_kontak();
        
        $this->load->view('admin/dashboard', $data);
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
