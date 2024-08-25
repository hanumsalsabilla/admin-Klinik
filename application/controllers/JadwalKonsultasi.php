<?php
defined('BASEPATH') or exit('No direct script access allowed');





class JadwalKonsultasi extends CI_Controller
{
    //constructor

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Jadwal Konsultasi';
        //ambil jumlah kunjungan
        $query = $this->db->get('tb_konsultasi');
        $data['jumlahkunjungan'] = $query->num_rows();
        $this->db->where('status=', 1);
        $queryy = $this->db->get('tb_konsultasi');
        $data['jumlahkunjunganberhasil'] = $queryy->num_rows();

        $queryy = $this->db->get('tb_konsultasiselesai');
        $data['jumlahselesai'] = $queryy->num_rows();

        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['kembali'] = '';

        $this->db->select('tb_pasien.nama,tb_konsultasi.id_konsultasi,tb_jadwal.jadwal, tb_konsultasi.status, tb_konsultasi.id_jadwal, tb_pasien.no_hp, tb_jadwal.id_jadwal,tb_jadwal.jam,tb_dokter.nama_dokter,tb_dokter.id_dokter');
        $this->db->from('tb_konsultasi');
        $this->db->join('tb_jadwal', 'tb_konsultasi.id_jadwal = tb_jadwal.id_jadwal');
        $this->db->join('tb_dokter', 'tb_dokter.id_dokter = tb_jadwal.id_dokter');
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien = tb_konsultasi.id_pasien');

        $data['konsultasi'] = $this->db->get()->result_array();

        $data['kembali'] = '';
        //tampilkan

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jadwalkonsultasi/jadwalkonsultasi', $data);
        $this->load->view('templates/footer');
    }
    public function deleteKonsultasi($id_konsultasi)
    {
        $this->db->where('id_konsultasi', $id_konsultasi);
        $this->db->delete('tb_konsultasi');
        $this->session->set_flashdata('category_success', 'Data berhasil dihapus');
        redirect('JadwalKonsultasi');
    }
    public function selesai($id_konsultasi)
    {
        $this->db->set('status', 1);
        $this->db->where('id_konsultasi', $id_konsultasi);
        $this->db->update('tb_konsultasi');
        $this->session->set_flashdata('category_success', 'Data berhasil diubah');
        redirect('JadwalKonsultasi');
    }
    public function kembali($id_konsultasi)
    {
        $this->db->where('id_konsultasi', $id_konsultasi);
        if ($this->db->update('tb_konsultasi', ['status' => 0]) == true) {
            $this->session->set_flashdata('category_success', 'Data berhasil diubah');
            redirect('JadwalKonsultasi');
        } else {
            $this->session->set_flashdata('category_error', 'Gagal mengubah data');
            redirect('JadwalKonsultasi');
        }
    }
    public function pindahkan($id_konsultasi)
    {
        $this->db->select('tb_pasien.nama,tb_konsultasi.id_konsultasi,tb_jadwal.jadwal, tb_konsultasi.status, tb_konsultasi.id_jadwal, tb_pasien.no_hp, tb_jadwal.id_jadwal,tb_jadwal.jam,tb_dokter.nama_dokter,tb_dokter.id_dokter,tb_konsultasi.id_pasien');
        $this->db->from('tb_konsultasi');
        $this->db->join('tb_jadwal', 'tb_konsultasi.id_jadwal = tb_jadwal.id_jadwal');
        $this->db->join('tb_dokter', 'tb_dokter.id_dokter = tb_jadwal.id_dokter');
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien = tb_konsultasi.id_pasien');
        $this->db->where('tb_konsultasi.id_konsultasi', $id_konsultasi);
        $data['konsultasi'] = $this->db->get()->result_array();
        $id_pasien = $data['konsultasi'][0]['id_pasien'];
        $nama_pasien = $data['konsultasi'][0]['nama'];
        $jadwal = $data['konsultasi'][0]['jadwal'];
        $jam = $data['konsultasi'][0]['jam'];
        $nama_dokter = $data['konsultasi'][0]['nama_dokter'];
        $no_hp = $data['konsultasi'][0]['no_hp'];

        //tambahkan ke db
        $data = [
            'nama_pasien' => $nama_pasien,
            'jadwal' => $jadwal,
            'jam' => $jam,
            'nama_dokter' => $nama_dokter,
            'no_hp' => $no_hp,
            'id_pasien' => $id_pasien
        ];
        $this->db->insert('tb_konsultasiselesai', $data);
        $this->session->set_flashdata('category_success', 'Data berhasil ditambahkan');
        //delete datanya
        $this->db->where('id_konsultasi', $id_konsultasi);
        $this->db->delete('tb_konsultasi');
        redirect('JadwalKonsultasi');
    }
}
