<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function ambil_semua_pekerjaan() {
        $this->db->order_by('tanggal_dibuat', 'DESC');
        return $this->db->get('pekerjaan')->result();
    }

    public function ambil_pekerjaan_berdasarkan_id($id) {
        return $this->db->get_where('pekerjaan', array('id' => $id))->row();
    }

    public function tambah_pekerjaan($data) {
        return $this->db->insert('pekerjaan', $data);
    }

    public function perbarui_pekerjaan($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('pekerjaan', $data);
    }

    public function hapus_pekerjaan($id) {
        return $this->db->delete('pekerjaan', array('id' => $id));
    }

    public function hitung_total_pekerjaan() {
        return $this->db->count_all('pekerjaan');
    }

    public function ambil_pekerjaan_terbaru($limit = 5) {
        $this->db->order_by('tanggal_dibuat', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('pekerjaan')->result();
    }
} 