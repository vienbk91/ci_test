<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
class Post_mo extends CI_Model {
	public function Post_mo() {
		parent::__construct ();
		$this->load->database();
	}
    
    public function getAllPost() {
        $sql = "select * from posts";
        $query = $this->db->query($sql);
        
        $result = $query->result_array();
        
        if ($result && count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }
    
    public function getPostById($post_id) {
        $sql = "select * from posts where post_id = ?";
        $query = $this->db->query($sql , array($post_id));
        
        $result = $query->result_array();
        
        if ($result && count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }
    
    public function deletePost($post_id) {
        $sql = "delete from posts where post_id = ?";
        $query = $this->db->query($sql , array($post_id));
        
        return $this->db->affected_rows();
    }
    
    public function updatePost($updatePost) {
        date_default_timezone_set('Asia/Tokyo');
        $data = array(
            'post_title' => $updatePost['post_title'] ,
            'post_content' => $updatePost['post_content'] ,
            'modified_date' => date('Y-m-d H:i:s' , time())
        );
        
        $this->db->where('post_id' , $updatePost['post_id']);
        $result = $this->db->update('posts' , $data);
        
        return $result;
    }
}