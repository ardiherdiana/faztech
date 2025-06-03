<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function simpan_kontak($data) {
        return $this->db->insert('kontak_form', $data);
    }

    public function ambil_semua_kontak() {
        $this->db->order_by('tanggal_dibuat', 'DESC');
        return $this->db->get('kontak_form')->result();
    }

    public function ambil_kontak_berdasarkan_id($id) {
        return $this->db->get_where('kontak_form', array('id' => $id))->row();
    }

    public function hapus_kontak($id) {
        return $this->db->delete('kontak_form', array('id' => $id));
    }

    public function hitung_total_kontak() {
        return $this->db->count_all('kontak_form');
    }
} 