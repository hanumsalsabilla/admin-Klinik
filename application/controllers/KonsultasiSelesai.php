<?php
defined('BASEPATH') or exit('No direct script access allowed');





class KonsultasiSelesai  extends CI_Controller
{
    //constructor

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Konsultasi Selesai';
        //ambil jumlah kunjungan


        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['kembali'] = '';

        $data['selesai'] = $this->db->get('tb_konsultasiselesai')->result_array();


        $data['kembali'] = '';
        //tampilkan

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jadwalkonsultasi/jadwalSelesai', $data);
        $this->load->view('templates/footer');
    }
}
