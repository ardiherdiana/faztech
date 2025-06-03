<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function ambil_semua_produk() {
        $this->db->order_by('tanggal_dibuat', 'DESC');
        return $this->db->get('produk')->result();
    }

    public function ambil_produk_berdasarkan_id($id) {
        return $this->db->get_where('produk', array('id' => $id))->row();
    }

    public function tambah_produk($data) {
        return $this->db->insert('produk', $data);
    }

    public function perbarui_produk($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('produk', $data);
    }

    public function hapus_produk($id) {
        return $this->db->delete('produk', array('id' => $id));
    }

    public function hitung_total_produk() {
        return $this->db->count_all('produk');
    }

    public function ambil_produk_unggulan($limit = 8) {
        $this->db->where('stok >', 0); // Hanya produk yang ada stoknya
        $this->db->order_by('tanggal_dibuat', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('produk')->result();
    }

    public function ambil_semua_kategori() {
        $this->db->select('kategori');
        $this->db->group_by('kategori');
        $this->db->order_by('kategori', 'ASC');
        return $this->db->get('produk')->result();
    }

    public function cari_produk_dengan_filter($kata_kunci = '', $kategori = '') {
        if (!empty($kata_kunci)) {
            $this->db->group_start();
            $this->db->like('nama_produk', $kata_kunci);
            $this->db->or_like('deskripsi', $kata_kunci);
            $this->db->group_end();
        }
        
        if (!empty($kategori)) {
            $this->db->where('kategori', $kategori);
        }
        
        $this->db->where('stok >', 0); // Hanya produk yang ada stoknya
        $this->db->order_by('nama_produk', 'ASC');
        return $this->db->get('produk')->result();
    }

    // Method untuk pagination produk dengan filter
    public function ambil_produk_dengan_pagination($limit, $offset, $kata_kunci = '', $kategori = '', $urutan = 'terbaru') {
        // Filter pencarian
        if (!empty($kata_kunci)) {
            $this->db->group_start();
            $this->db->like('nama_produk', $kata_kunci);
            $this->db->or_like('deskripsi', $kata_kunci);
            $this->db->group_end();
        }
        
        if (!empty($kategori)) {
            $this->db->where('kategori', $kategori);
        }
        
        // Hanya produk yang ada stoknya
        $this->db->where('stok >', 0);
        
        // Pengurutan
        switch($urutan) {
            case 'nama_asc':
                $this->db->order_by('nama_produk', 'ASC');
                break;
            case 'nama_desc':
                $this->db->order_by('nama_produk', 'DESC');
                break;
            case 'harga_asc':
                $this->db->order_by('harga', 'ASC');
                break;
            case 'harga_desc':
                $this->db->order_by('harga', 'DESC');
                break;
            case 'terlama':
                $this->db->order_by('tanggal_dibuat', 'ASC');
                break;
            default: // terbaru
                $this->db->order_by('tanggal_dibuat', 'DESC');
                break;
        }
        
        $this->db->limit($limit, $offset);
        return $this->db->get('produk')->result();
    }

    // Method untuk menghitung total produk dengan filter
    public function hitung_total_produk_dengan_filter($kata_kunci = '', $kategori = '') {
        if (!empty($kata_kunci)) {
            $this->db->group_start();
            $this->db->like('nama_produk', $kata_kunci);
            $this->db->or_like('deskripsi', $kata_kunci);
            $this->db->group_end();
        }
        
        if (!empty($kategori)) {
            $this->db->where('kategori', $kategori);
        }
        
        $this->db->where('stok >', 0);
        return $this->db->count_all_results('produk');
    }
}
