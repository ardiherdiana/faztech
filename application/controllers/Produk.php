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

// application/controllers/Testimoni.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->cek_admin();
        $this->load->model('Testimoni_model');
    }

    public function index() {
        $data['judul'] = 'Kelola Testimoni - Admin';
        $data['testimoni'] = $this->Testimoni_model->ambil_semua_testimoni();
        
        $this->load->view('admin/testimoni/index', $data);
    }

    public function tambah() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
            $this->form_validation->set_rules('rating', 'Rating', 'required|in_list[1,2,3,4,5]');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Konfigurasi upload
                $config['upload_path'] = './uploads/testimonials/';
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
                    'nama' => $this->input->post('nama'),
                    'jabatan' => $this->input->post('jabatan'),
                    'rating' => $this->input->post('rating'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $nama_gambar
                );

                if ($this->Testimoni_model->tambah_testimoni($data)) {
                    $this->session->set_flashdata('sukses', 'Testimoni berhasil ditambahkan!');
                    redirect('testimoni');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan testimoni!');
                }
            }
        }

        $data['judul'] = 'Tambah Testimoni - Admin';
        $this->load->view('admin/testimoni/tambah', $data);
    }

    public function edit($id) {
        $testimoni = $this->Testimoni_model->ambil_testimoni_berdasarkan_id($id);
        if (!$testimoni) {
            show_404();
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
            $this->form_validation->set_rules('rating', 'Rating', 'required|in_list[1,2,3,4,5]');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './uploads/testimonials/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);

                $nama_gambar = $testimoni->gambar;
                if ($this->upload->do_upload('gambar')) {
                    // Hapus gambar lama
                    if ($testimoni->gambar && file_exists('./uploads/testimonials/' . $testimoni->gambar)) {
                        unlink('./uploads/testimonials/' . $testimoni->gambar);
                    }
                    
                    $upload_data = $this->upload->data();
                    $nama_gambar = $upload_data['file_name'];
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
                    redirect('testimoni');
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
        $testimoni = $this->Testimoni_model->ambil_testimoni_berdasarkan_id($id);
        if (!$testimoni) {
            show_404();
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
        redirect('testimoni');
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