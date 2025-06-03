<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function ambil_semua_testimoni() {
        $this->db->order_by('tanggal_dibuat', 'DESC');
        return $this->db->get('testimoni')->result();
    }

    public function ambil_testimoni_berdasarkan_id($id) {
        return $this->db->get_where('testimoni', array('id' => $id))->row();
    }

    public function tambah_testimoni($data) {
        return $this->db->insert('testimoni', $data);
    }

    public function perbarui_testimoni($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('testimoni', $data);
    }

    public function hapus_testimoni($id) {
        return $this->db->delete('testimoni', array('id' => $id));
    }

    public function hitung_total_testimoni() {
        return $this->db->count_all('testimoni');
    }

    public function ambil_testimoni_terbaru($limit = 3) {
        $this->db->order_by('tanggal_dibuat', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('testimoni')->result();
    }
}