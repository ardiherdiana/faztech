<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function daftar($data) {
        return $this->db->insert('users', $data);
    }

    public function cek_email($email) {
        return $this->db->get_where('users', array('email' => $email))->row();
    }

    public function ambil_semua_pengguna() {
        return $this->db->get('users')->result();
    }

    public function ambil_pengguna_berdasarkan_id($id) {
        return $this->db->get_where('users', array('id' => $id))->row();
    }

    public function perbarui_pengguna($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function hapus_pengguna($id) {
        return $this->db->delete('users', array('id' => $id));
    }
}
