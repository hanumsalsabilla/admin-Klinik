<?php
defined('BASEPATH') or exit('No direct script access allowed');





class JadwalDokter extends CI_Controller
{
    //constructor

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Jadwal Dokter';
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->select('tb_jadwal.id_jadwal,tb_jadwal.jadwal,tb_jadwal.jam,tb_jadwal.id_dokter,tb_dokter.nama_dokter');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_dokter', 'tb_dokter.id_dokter = tb_jadwal.id_dokter');
        $data['jadwal'] = $this->db->get()->result_array();

        //Spinner Dokter

        $data['dokteronly'] = $this->db->get('tb_dokter')->result_array();

        $data['kembali'] = '';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/jadwaldokter', $data);
        $this->load->view('templates/footer');
    }
    public function tambahDataDokter()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim'); //Add data
        $this->form_validation->set_rules('jadwal', 'Jadwal', 'required|trim'); //Add data
        $this->form_validation->set_rules('jam', 'Jam', 'required|trim'); //Add data
        

        $data = [
            'id_dokter' => htmlspecialchars($this->input->post('id', true)),
            'jadwal' => htmlspecialchars($this->input->post('jadwal', true)),
            'jam' => htmlspecialchars($this->input->post('jam', true)),
            

        ];


        if ($this->db->insert('tb_jadwal', $data) != null) {
            $this->session->set_flashdata('category_success', 'Data berhasil ditambahkan');
            redirect('JadwalDokter');
        } else {
            $this->session->set_flashdata('category_error', 'Gagal menambah data');
            redirect('JadwalDokter');
        }
    }

    public function deleteDokter($id_jadwal)
    {
        $this->db->where('id_jadwal', $id_jadwal);
        if ($this->db->delete('tb_jadwal') != null) {
            $this->session->set_flashdata('category_success', 'Data berhasil dihapus');
            redirect('JadwalDokter');
        } else {
            $this->session->set_flashdata('category_error', 'Gagal menghapus data');
            redirect('JadwalDokter');
        }
    }

    public function editDokter($id_jadwal)
    {
        $data['title'] = 'Edit Jadwal Dokter';
        //ambil
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['dokteronly'] = $this->db->get('tb_dokter')->result_array();
        $data['dokter'] = $this->db->get_where('tb_jadwal', ['id_jadwal' => $id_jadwal])->row_array();
        //tampilkan
        $data['kembali'] = 'kembali';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/editdokter', $data);
        $this->load->view('templates/footer');
    }

    public function editDokter2()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim'); //Add data
        $this->form_validation->set_rules('jadwal', 'Jadwal', 'required|trim'); //Add data
        $this->form_validation->set_rules('jam', 'Jam', 'required|trim'); //Add data
       

        $data = [
            'id_dokter' => htmlspecialchars($this->input->post('id_dokter', true)),
            'jadwal' => htmlspecialchars($this->input->post('jadwal', true)),
            'jam' => htmlspecialchars($this->input->post('jam', true)),
            

        ];

        $id_jadwal = $this->input->post('id_jadwal');
        $this->db->where('id_jadwal', $id_jadwal);


        if ($this->db->update('tb_jadwal', $data) != null) {
            $this->session->set_flashdata('category_success', 'Data berhasil diubah');
            redirect('JadwalDokter');
        } else {
            $this->session->set_flashdata('category_error', 'Gagal mengubah data');
            redirect('JadwalDokter');
        }
        redirect('JadwalDokter');
    }
}
