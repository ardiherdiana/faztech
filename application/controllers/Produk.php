<?php
// application/controllers/Produk.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->cek_admin();
        $this->load->model('Produk_model');
    }

    public function index() {
        // Redirect to admin if accessing directly
        redirect('admin/produk');
    }

    public function admin() {
        $data['judul'] = 'Kelola Produk - Admin';
        $data['produk'] = $this->Produk_model->ambil_semua_produk();
        
        $this->load->view('admin/produk/index', $data);
    }

    public function tambah() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
            $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Konfigurasi upload
                $config['upload_path'] = './uploads/products/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);

                $nama_gambar = '';
                if ($this->upload->do_upload('gambar')) {
                    $upload_data = $this->upload->data();
                    $nama_gambar = $upload_data['file_name'];
                }

                $data = array(
                    'nama_produk' => $this->input->post('nama_produk'),
                    'kategori' => $this->input->post('kategori'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('stok'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $nama_gambar
                );

                if ($this->Produk_model->tambah_produk($data)) {
                    $this->session->set_flashdata('sukses', 'Produk berhasil ditambahkan!');
                    redirect('admin/produk');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan produk!');
                }
            }
        }

        $data['judul'] = 'Tambah Produk - Admin';
        $this->load->view('admin/produk/tambah', $data);
    }

    public function edit($id) {
        $produk = $this->Produk_model->ambil_produk_berdasarkan_id($id);
        if (!$produk) {
            show_404();
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
            $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './uploads/products/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);

                $nama_gambar = $produk->gambar;
                if ($this->upload->do_upload('gambar')) {
                    // Hapus gambar lama
                    if ($produk->gambar && file_exists('./uploads/products/' . $produk->gambar)) {
                        unlink('./uploads/products/' . $produk->gambar);
                    }
                    
                    $upload_data = $this->upload->data();
                    $nama_gambar = $upload_data['file_name'];
                }

                $data = array(
                    'nama_produk' => $this->input->post('nama_produk'),
                    'kategori' => $this->input->post('kategori'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('stok'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $nama_gambar
                );

                if ($this->Produk_model->perbarui_produk($id, $data)) {
                    $this->session->set_flashdata('sukses', 'Produk berhasil diperbarui!');
                    redirect('admin/produk');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui produk!');
                }
            }
        }

        $data['judul'] = 'Edit Produk - Admin';
        $data['produk'] = $produk;
        $this->load->view('admin/produk/edit', $data);
    }

    public function hapus($id) {
        $produk = $this->Produk_model->ambil_produk_berdasarkan_id($id);
        if (!$produk) {
            show_404();
        }

        // Hapus gambar jika ada
        if ($produk->gambar && file_exists('./uploads/products/' . $produk->gambar)) {
            unlink('./uploads/products/' . $produk->gambar);
        }

        if ($this->Produk_model->hapus_produk($id)) {
            $this->session->set_flashdata('sukses', 'Produk berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus produk!');
        }
        redirect('admin/produk');
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