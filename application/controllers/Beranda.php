<?php
// application/controllers/Beranda.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Testimoni_model');
        $this->load->model('Kontak_model');
    }

    public function index() {
        // Ambil data dari database
        $data['judul'] = 'FazTech - Solusi Keamanan Terpercaya';
        $data['produk_unggulan'] = $this->Produk_model->ambil_produk_unggulan(8); // 8 produk unggulan
        $data['testimoni_terbaru'] = $this->Testimoni_model->ambil_testimoni_terbaru(5); // 5 testimoni terbaru
        $data['kategori_produk'] = $this->Produk_model->ambil_semua_kategori(); // Untuk dropdown filter
        
        // Hitung total produk untuk menentukan apakah perlu tombol "Lihat selengkapnya"
        $data['total_produk'] = $this->Produk_model->hitung_total_produk();
        
        // Status login user
        $data['sudah_login'] = $this->session->userdata('login') ? true : false;
        $data['nama_pengguna'] = $this->session->userdata('nama_lengkap');
        $data['peran_pengguna'] = $this->session->userdata('peran');
        
        $this->load->view('beranda/index', $data);
    }

    // Method untuk halaman produk lengkap dengan pagination
    public function produk() {
        // Load library pagination
        $this->load->library('pagination');
        
        // Parameter dari URL dan form
        $kata_kunci = $this->input->get('search') ? $this->input->get('search') : '';
        $kategori = $this->input->get('kategori') ? $this->input->get('kategori') : '';
        $urutan = $this->input->get('urutan') ? $this->input->get('urutan') : 'terbaru';
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        
        // Konfigurasi pagination
        $per_page = 12; // 12 produk per halaman
        $offset = ($page - 1) * $per_page;
        
        // Ambil data produk dengan pagination
        $produk = $this->Produk_model->ambil_produk_dengan_pagination($per_page, $offset, $kata_kunci, $kategori, $urutan);
        $total_produk = $this->Produk_model->hitung_total_produk_dengan_filter($kata_kunci, $kategori);
        $total_semua_produk = $this->Produk_model->hitung_total_produk(); // Total produk tanpa filter untuk stats
        
        // Konfigurasi pagination
        $config['base_url'] = base_url('produk');
        $config['total_rows'] = $total_produk;
        $config['per_page'] = $per_page;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['reuse_query_string'] = TRUE;
        
        // Styling pagination
        $config['full_tag_open'] = '<nav aria-label="Pagination"><ul class="flex justify-center space-x-2 mt-8">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'Pertama';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Terakhir';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Selanjutnya';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Sebelumnya';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><span class="px-4 py-2 bg-primary text-white rounded-lg">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_links'] = 3;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors');
        
        $this->pagination->initialize($config);
        
        // Data untuk view
        $data['judul'] = 'Semua Produk - FazTech';
        $data['produk'] = $produk;
        $data['kategori_produk'] = $this->Produk_model->ambil_semua_kategori();
        $data['kata_kunci'] = $kata_kunci;
        $data['kategori_terpilih'] = $kategori;
        $data['urutan_terpilih'] = $urutan;
        $data['total_produk'] = $total_produk;
        $data['total_semua_produk'] = $total_semua_produk; // Total produk tanpa filter
        $data['pagination_links'] = $this->pagination->create_links();
        $data['current_page'] = $page;
        $data['total_pages'] = ceil($total_produk / $per_page);
        
        // Status login user
        $data['sudah_login'] = $this->session->userdata('login') ? true : false;
        $data['nama_pengguna'] = $this->session->userdata('nama_lengkap');
        $data['peran_pengguna'] = $this->session->userdata('peran');
        
        $this->load->view('beranda/produk', $data);
    }

    // AJAX untuk pencarian produk
    public function cari_produk() {
        $kata_kunci = $this->input->post('kata_kunci');
        $kategori = $this->input->post('kategori');
        
        $produk = $this->Produk_model->cari_produk_dengan_filter($kata_kunci, $kategori);
        
        // Return JSON untuk AJAX
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($produk));
    }

    // AJAX untuk detail produk (modal)
    public function detail_produk($id) {
        $produk = $this->Produk_model->ambil_produk_berdasarkan_id($id);
        
        if (!$produk) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['error' => 'Produk tidak ditemukan']));
            return;
        }
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($produk));
    }

    // Method untuk generate link WhatsApp
    private function generate_whatsapp_link($nama_produk, $harga) {
        $nomor_whatsapp = '6281234567890'; // Ganti dengan nomor admin
        $pesan = "Halo admin, saya tertarik untuk membeli produk: {$nama_produk} dengan harga Rp " . number_format($harga, 0, ',', '.');
        $pesan_encoded = urlencode($pesan);
        
        return "https://wa.me/{$nomor_whatsapp}?text={$pesan_encoded}";
    }

    // AJAX untuk mendapatkan link WhatsApp
    public function whatsapp_link() {
        $nama_produk = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        
        $link = $this->generate_whatsapp_link($nama_produk, $harga);
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['link' => $link]));
    }

    public function kirim_kontak() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
            $this->form_validation->set_rules('telepon', 'Telepon', 'required|min_length[8]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('jenis_properti', 'Jenis Properti', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'nama' => $this->input->post('nama'),
                    'telepon' => '+62' . $this->input->post('telepon'),
                    'email' => $this->input->post('email'),
                    'jenis_properti' => $this->input->post('jenis_properti'),
                    'catatan' => $this->input->post('catatan')
                );

                if ($this->Kontak_model->simpan_kontak($data)) {
                    $this->session->set_flashdata('sukses', 'Pesan Anda berhasil dikirim! Kami akan menghubungi Anda segera.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengirim pesan. Silakan coba lagi.');
                }
            } else {
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        
        redirect('beranda#kontak');
    }
}