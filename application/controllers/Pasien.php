<?php
defined('BASEPATH') or exit('No direct script access allowed');





class Pasien extends CI_Controller
{
    //constructor

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Pasien';
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['pasien'] = $this->db->get('tb_pasien')->result_array();
        $data['kembali'] = '';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasien/pasien', $data);
        $this->load->view('templates/footer');
    }
}
