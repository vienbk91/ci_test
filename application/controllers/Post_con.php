<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Post_con extends CI_Controller {
	public function Post_con() {
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->config('config');
		$this->load->model('post_mo');
	}
    
    public function index() {
        
        // check session
        $admin = $this->session->userdata('admin');
        
        if (isset($admin) && $admin != '') {
            $data = array();
            $allPost = $this->post_mo->getAllPost();
            
            var_dump($allPost);
        } else { // session not exist
            redirect(base_url('login_con'));
        }
    }
 }