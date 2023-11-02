<?php
defined('BASEPATH') OR exit('No direct script acces allowed');

class Login extends CI_Controller {
    
    public function __constract(){
        parent::__constract();
        $this->load->library('form_validation');
    }
	public function index()
	{
        $this->form_validation->set_rules('email','email','required|trim');
        $this->form_validation->set_rules('password','password','required|trim');

        if ($this->form_validation->run() == false){
            $this->load->view('login/index');
        } else {
            $this->dologin();
        }
	}

    public function dologin(){
        $user = $this->input->post('email');
        $pswd = $this->input->post('password');

        $user = $this->db->get_where('tb_user',['email'=>$user])->row_array();
    if($user){
        if(password_verify($pswd, $user['password'])){
            $data = [
                'id'=>$user['id'],
                'email'=>$user['email'],
                'passowrd'=>$user['password'],
                'role'=>$user['role']

            ];
            $userid = $user['id'];
            $this->session->set_userdata($data);

            if($user['role'] == 'admin') {
                redirect('menu');
            }else{
                redirect('welcome');
            }
        }else{
            redirect('/');
        }

    }else{
        redirect('/');
    }

    }
}
