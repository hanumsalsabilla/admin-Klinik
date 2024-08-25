<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');

    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index() //method Login

    {
        $this->form_validation->set_rules('username', 'Username',  'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->session->userdata('username')) {
            redirect('Admin');
        }
        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_login(); //menandakan method private
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tb_admin', ['username' => $username])->row_array();
        if ($user) {
            //jika usernya aktif cek password
            if (password_verify($password, $user['password'])) {

                if ($user['active'] == 1) {
                    $this->session->set_userdata($user);
                    redirect('Admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong password!</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            username is not registered!</div>');
            redirect('Auth');
        }
    }

    /*method register */
    public function registration()


    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username',  'required|trim|is_unique[tb_admin.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->session->userdata('username')) {
            redirect('Admin');
        }
        if ($this->form_validation->run('registration') == false) {
            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);

            $this->load->view('auth/registration');

            $this->load->view('templates/auth_footer');
        } else {
            //data masuk ke db
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'active' => 0
            ];
            $this->db->insert('tb_admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
            redirect('Auth');
        }
    }



    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('Auth');
    }
    public function blocked()
    {
        $this->load->view('Auth/blocked');
    }
}
