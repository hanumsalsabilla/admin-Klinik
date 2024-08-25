<?php
defined('BASEPATH') or exit('No direct script access allowed');





class Obat extends CI_Controller
{
    //constructor

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Obat';
        //ambil
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['kembali'] = '';
        $data['obat'] = $this->db->get('tb_obat')->result_array();
        //tampilkan
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('obat/pesananobat', $data);
        $this->load->view('templates/footer');
    }


    public function tambahObat()
    {
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {

            $config['upload_path']          = './upload/obat';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100000;
            $config['max_width']            = 102400;
            $config['max_height']           = 76800;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {

                $this->form_validation->set_rules('nama', 'Nama', 'required|trim'); //Add data
                $this->form_validation->set_rules('stok', 'Stok', 'required|trim'); //Add data
                $this->form_validation->set_rules('harga', 'Harga', 'required|trim'); //Add data
                $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim'); //Add data
                $data = [
                    'nama_obat' => htmlspecialchars($this->input->post('nama', true)),
                    'stok_obat' => htmlspecialchars($this->input->post('stok', true)),
                    'harga' => htmlspecialchars($this->input->post('harga', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'gambar_obat' => $upload_image

                ];
                if ($this->form_validation->run() == false) {
                    $this->session->set_flashdata('category_error', 'Data Gagal Ditambahkan');
                    redirect('Obat');
                } else {
                    $this->db->insert('tb_obat', $data);
                    $this->session->set_flashdata('category_success', 'Data Berhasil Ditambahkan');
                    redirect('Obat');
                }
            } else {
                $this->session->set_flashdata('category_error', 'Data Gagal Ditambahkan');
                redirect('Obat');
            }
        } else {
            $this->session->set_flashdata('category_error', 'Data Gagal Ditambahkan');
            redirect('Obat');
        }
    }
    public function deleteObat($id)
    {
        $this->db->where('id_obat', $id);
        if ($this->db->delete('tb_obat') != null) {
            $this->session->set_flashdata('category_success', 'Data berhasil dihapus');
            redirect('Obat');
        } else {
            $this->session->set_flashdata('category_error', 'Gagal menghapus data');
            redirect('Obat');
        }
    }
    public function editObat($id_obat)
    {
        $data['title'] = 'Edit Obat';
        //ambil
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['dokter'] = $this->db->get_where('tb_obat', ['id_obat' => $id_obat])->row_array();
        $data['kembali'] = 'kembali';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('obat/editobat', $data);
        $this->load->view('templates/footer');
    }

    public function editObat2()
    {

        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {

            $config['upload_path']          = './upload/obat';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100000;
            $config['max_width']            = 102400;
            $config['max_height']           = 76800;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image') && $upload_image != null) {

                $this->form_validation->set_rules('nama', 'Nama', 'required|trim'); //Add data
                $this->form_validation->set_rules('stok', 'Stok', 'required|trim'); //Add data
                $this->form_validation->set_rules('harga', 'Harga', 'required|trim'); //Add data
                $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim'); //Add data
                $data = [
                    'nama_obat' => htmlspecialchars($this->input->post('nama', true)),
                    'stok_obat' => htmlspecialchars($this->input->post('stok', true)),
                    'harga' => htmlspecialchars($this->input->post('harga', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'gambar_obat' => $upload_image

                ];
                if ($this->form_validation->run() == false) {
                    $this->session->set_flashdata('category_error', 'Data Gagal Diubah');
                    redirect('Obat');
                } else {
                    unlink(FCPATH . 'upload/obat/' . $this->input->post('old_image'));
                    $this->db->where('id_obat', $this->input->post('id_obat'));
                    $this->db->update('tb_obat', $data);
                    $this->session->set_flashdata('category_success', 'Data Berhasil Diubah');
                    redirect('Obat');
                }
            } else {
                $this->session->set_flashdata('category_error', 'Data Gagal Diubah');
                redirect('Obat');
            }
        } else {

            $this->form_validation->set_rules('nama', 'Nama', 'required|trim'); //Add data
            $this->form_validation->set_rules('stok', 'Stok', 'required|trim'); //Add data
            $this->form_validation->set_rules('harga', 'Harga', 'required|trim'); //Add data
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim'); //Add data
            $data = [
                'nama_obat' => htmlspecialchars($this->input->post('nama', true)),
                'stok_obat' => htmlspecialchars($this->input->post('stok', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true)),
                'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                'gambar_obat' => $this->input->post('old_image')

            ];
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('category_error', 'Data Gagal Diubah');
                redirect('Obat');
            } else {
                $this->db->where('id_obat', $this->input->post('id_obat'));
                $this->db->update('tb_obat', $data);
                $this->session->set_flashdata('category_success', 'Data Berhasil Diubah');
                redirect('Obat');
                $this->session->set_flashdata('category_success', 'Data Berhasil Diubah');
            }
            redirect('Obat');
        }
    }
}
