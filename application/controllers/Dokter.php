<?php
defined('BASEPATH') or exit('No direct script access allowed');





class Dokter extends CI_Controller
{
    //constructor

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Dokter';
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['jadwal'] = $this->db->get('tb_dokter')->result_array();
        $data['kembali'] = '';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter2/dokter', $data);
        $this->load->view('templates/footer');
    }
    public function tambahDataDokter()
    {
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {

            $config['upload_path']          = './upload/dokter/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100000;
            $config['max_width']            = 102400;
            $config['max_height']           = 76800;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $this->form_validation->set_rules('nama', 'Nama', 'required|trim'); //Add data
                $this->form_validation->set_rules('spesialis', 'Spesialis', 'required|trim'); //Add data
                $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim'); //Add data
                $this->form_validation->set_rules('fotodokter', 'Fotodokter', 'required|trim'); //Add data
                $data = [
                    'nama_dokter' => htmlspecialchars($this->input->post('nama', true)),
                    'spesialis' => htmlspecialchars($this->input->post('spesialis', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'foto_dokter' => $upload_image
                ];
                if ($this->db->insert('tb_dokter', $data) != null) {
                    $this->session->set_flashdata('category_success', 'Data berhasil ditambahkan');
                    redirect('Dokter');
                } else {
                    $this->session->set_flashdata('category_error', 'Gagal menambah data');
                    redirect('Dokter');
                }
            } else {
                $this->session->set_flashdata('category_error', 'Gagal menambah data');
                redirect('Dokter');
            }
        }
    }
    public function deleteDokter($id_dokter)
    {
        $this->db->where('id_dokter', $id_dokter);
        if ($this->db->delete('tb_dokter') != null) {
            $this->session->set_flashdata('category_success', 'Data berhasil dihapus');
            redirect('Dokter');
        } else {
            $this->session->set_flashdata('category_error', 'Gagal menghapus data');
            redirect('Dokter');
        }
    }

    public function editDokter($id_dokter)
    {
        $data['title'] = 'Edit Dokter';
        //ambil
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['dokter'] = $this->db->get_where('tb_dokter', ['id_dokter' => $id_dokter])->row_array();
        //tampilkan
        $data['kembali'] = 'kembali';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter2/editdokter', $data);
        $this->load->view('templates/footer');
    }

    public function editDokter2()
    {
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {

            $config['upload_path']          = './upload/dokter/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100000;
            $config['max_width']            = 102400;
            $config['max_height']           = 76800;

            $this->load->library('upload', $config);
            //Validasi jika tidak ada gambar

            if ($this->upload->do_upload('image') && $upload_image != null) {


                $data = [
                    'nama_dokter' => htmlspecialchars($this->input->post('nama', true)),
                    'spesialis' => htmlspecialchars($this->input->post('spesialis', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'foto_dokter' => $upload_image
                ];
                //Validasi dihapus aja  g guna malah bikin error 
                unlink(FCPATH . 'upload/dokter/' . $this->input->post('old_image'));
                $this->db->where('id_dokter', $this->input->post('id_dokter'));
                $this->db->update('tb_dokter', $data);
                $this->session->set_flashdata('category_success', 'Data Berhasil Diubah');
                redirect('Dokter');
            } else {
                $this->session->set_flashdata('category_error', 'Data Gagal Diubah');
                redirect('Dokter');
            }
        } else {
            // $this->session->set_flashdata('category_error', 'Data Gagal Diubah');
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim'); //Add data
            $this->form_validation->set_rules('spesialis', 'Spesialis', 'required|trim'); //Add data
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim'); //Add data

            $data = [
                'nama_dokter' => htmlspecialchars($this->input->post('nama', true)),
                'spesialis' => htmlspecialchars($this->input->post('spesialis', true)),
                'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            ];
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('category_error', 'Data Gagal Diubah');
                redirect('Dokter');
            } else {
                $this->db->where('id_dokter', $this->input->post('id_dokter'));
                $this->db->update('tb_dokter', $data);
                $this->session->set_flashdata('category_success', 'Data Berhasil Diubah');
                redirect('Dokter');
            }
            redirect('Dokter');
        }
    }
}
