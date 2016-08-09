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
           $deleteFlag = 0;
           $this->loadPostView($deleteFlag);
        } else { // session not exist
            redirect(base_url('login_con'));
        }
    }
    
    public function loadPostView($deleteFlag) {
         $data = array();
         /*
         $allPost = $this->post_mo->getAllPost();
         $data['allPost'] = $allPost;
         */
         $data['deleteFlag'] = $deleteFlag;
         //$this->load->view('post_vi' , $data);
         
         // New
        $total_row = $this->post_mo->getTotalRow();
        
        $perpage = 4; // So post hien thi tren 1 page
        
        $config['total_rows']  =  $total_row;
        $config['base_url'] = base_url('post_con/index/');
        $config['per_page']  =  $perpage;
        
        $start = ($this->uri->segment(3) == '') ? 0 : $this->uri->segment(3); 
        $this->load->library('pagination', $config);
        $data['allPost']= $this->post_mo->getListPosts($perpage , $start);
        
        $data['pagination'] = $this->pagination->create_links();
        
        $this->load->view('post_paging_vi' , $data);
    }
    
    public function edit() {
        // check session
        $admin = $this->session->userdata('admin');
        
        if (isset($admin) && $admin != '') {
            
            if ($this->input->post('edit_post') != NULL) {
               
                $updatePost = array();
                $updatePost['post_id'] = $this->input->post('post_id');
                $updatePost['post_title'] = $this->input->post('post_title');
                $updatePost['post_content'] = $this->input->post('post_content');
                
                $result = $this->post_mo->updatePost($updatePost);
                
                if ($result) {
                    $updateFlag = 1; // update succesfull
                } else {
                    $updateFlag = 2; // update lose
                }
                
            } else {
                $updateFlag = 0;
            }
            
            $data = array();
            $post_id = $this->input->post('post_id');
            if (!isset($post_id) || $post_id == '' || $post_id == NULL) {
                redirect(base_url('post_con'));
                return;
            }
            $post = $this->post_mo->getPostById($post_id);
            
            $data['title'] = "変更画面";
            $data['post'] = $post;
            $data['updateFlag'] = $updateFlag;
            
            $this->load->view('post_edit_vi' , $data);
            
           
        } else {
            redirect(base_url('login_con'));
        }
    }
    
    public function delete() {
        // check session
        $admin = $this->session->userdata('admin');
        
        if (isset($admin) && $admin != '') {
            $post_id = $this->input->post('post_id');
            $result = $this->post_mo->deletePost($post_id);
            
            if ($result == 1) {
                $deleteFlag = 1;
            } else {
                $deleteFlag = 2;
            }
            $this->loadPostView($deleteFlag);
            
        } else {
            redirect(base_url('login_con'));
        }
    }
    
    public function phantrang() {
        
        $total_row = $this->post_mo->getTotalRow();
        
        $perpage = 3; // So post hien thi tren 1 page
        
		$config['total_rows']  =  $total_row;
        $config['base_url'] = base_url('post_con/phantrang/');
		$config['per_page']  =  $perpage;
	
        $start=$this->uri->segment(3);
        $this->load->library('pagination', $config);
        $data['allPost']= $this->post_mo->getListPosts($perpage , $start);
        
        $data['pagination'] = $this->pagination->create_links();
        
        $this->load->view('post_paging_vi' , $data);
    }
 }