<?php
defined('BASEPATH') or exit('No direct script access allowed');





class Kurir extends CI_Controller
{
    //constructor

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Kurir';
        //ambil
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['kembali'] = '';
        //query kurir
        
         $this->db->select('tb_pengiriman.id_pengiriman,tb_pengiriman.id_pasien,tb_pengiriman.total,tb_pengiriman.detail,tb_pengiriman.status,tb_pasien.nama,tb_pasien.alamat');
        $this->db->from('tb_pengiriman');
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien = tb_pengiriman.id_pasien');
        
        
        
        $data['kurir'] = $this->db->get()->result_array();
        //tampilkan
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kurir/kurir', $data);
        $this->load->view('templates/footer');
    }
    public function selesai($id_pengiriman)
    {
        $this->db->where('id_pengiriman', $id_pengiriman);
        if ($this->db->update('tb_pengiriman', ['status' => 1]) == true) {
            $this->session->set_flashdata('category_success', 'Data berhasil diubah');
            redirect('Kurir');
        } else {
            $this->session->set_flashdata('category_error', 'Gagal mengubah data');
            redirect('Kurir');
        }
    }
    public function deletePengiriman($id_pengiriman)
    {
        $this->db->where('id_pengiriman', $id_pengiriman);
        if ($this->db->delete('tb_pengiriman') == true) {
            $this->session->set_flashdata('category_success', 'Data berhasil dihapus');
            redirect('Kurir');
        } else {
            $this->session->set_flashdata('category_error', 'Gagal menghapus data');
            redirect('Kurir');
        }
    }
    public function kembali($id_pengiriman)
    {
        $this->db->where('id_pengiriman', $id_pengiriman);
        if ($this->db->update('tb_pengiriman', ['status' => 0]) == true) {
            $this->session->set_flashdata('category_success', 'Data berhasil diubah');
            redirect('Kurir');
        } else {
            $this->session->set_flashdata('category_error', 'Gagal mengubah data');
            redirect('Kurir');
        }
    }
}
