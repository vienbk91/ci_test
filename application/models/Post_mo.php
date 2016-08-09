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
}