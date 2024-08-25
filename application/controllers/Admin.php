<?php
defined('BASEPATH') or exit('No direct script access allowed');





class Admin extends CI_Controller
{
    //constructor

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['kembali'] = '';
        //ambil
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
        //tampilkan

        $data['dokter'] = $this->db->get('tb_dokter')->num_rows();
        $data['konsultasi'] = $this->db->get('tb_konsultasi')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
