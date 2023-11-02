<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('login/index');
        } else {
            $this->dologin();
        }
    }

    public function dologin()
    {
        $user = $this->input->post('email');
        $pswd = $this->input->post('password');
        $user = $this->db->get_where('tb_user', ['email' => $user])->row_array();
        if ($user) {
            if (password_verify($pswd, $user['password'])) {
                $data = [
                    'id'      => $user['id'],
                    'email'     => $user['email'],
                    'username'    => $user['username'],
                    'role'        => $user['role']
                ];
                $userid = $user['id'];
                $this->session->set_userdata($data);

                if ($user['role'] == 'admin') {
                    redirect('menu');
                } else {
                    redirect('welcome');
                }
            } else {
                redirect('/');
            }
        } else {
            redirect('/');
        }
    }
}
