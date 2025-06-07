<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function ambil_semua_portfolio() {
        $this->db->order_by('tanggal_dibuat', 'DESC');
        return $this->db->get('portfolio')->result();
    }

    public function ambil_portfolio_berdasarkan_id($id) {
        return $this->db->get_where('portfolio', array('id' => $id))->row();
    }

    public function tambah_portfolio($data) {
        return $this->db->insert('portfolio', $data);
    }

    public function perbarui_portfolio($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('portfolio', $data);
    }

    public function hapus_portfolio($id) {
        return $this->db->delete('portfolio', array('id' => $id));
    }

    public function hitung_total_portfolio() {
        return $this->db->count_all('portfolio');
    }

    public function ambil_portfolio_terbaru($limit = 5) {
        $this->db->order_by('tanggal_dibuat', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('portfolio')->result();
    }
} 