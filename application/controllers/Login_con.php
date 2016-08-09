<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_con extends CI_Controller {
	public function Login_con() {
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->config('config');
		$this->load->model('login_mo');
	}
    
	public function index() {
		if ($this->input->post('submit') != NULL) {
            $user_nic = $this->input->post('user_nic');
            $user_password = $this->input->post('user_password');
            
            $data = array();
            
            $data['user_nic'] = $user_nic;
            $data['user_password'] = $user_password;
            
            $isExistUser = $this->login_mo->checkExistUser($user_nic , $user_password);
            if ($isExistUser) {
                //echo "AAAA";
                $this->session->set_userdata('admin' , $user_nic);
                redirect(base_url('post_con'));
            } else {
                $data['message'] = "ユーザ名とパスワードが一統ではありません。";
                $this->load->view('login_vi' , $data);
            }
		} else {
            $data['title'] = 'ログイン画面';
            $this->load->view('login_vi' , $data);
		}
	}
}