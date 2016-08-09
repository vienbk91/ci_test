<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
class Login_mo extends CI_Model {
	public function Login_mo() {
		parent::__construct ();
		$this->load->database();
	}
	
	
	public function checkExistUser($user_nic , $user_password) {
		$sql = "select count(user_id) count_user_id from users where user_nic = ? and user_password = ?";
		$query = $this->db->query($sql , array(trim($user_nic) , trim($user_password)) );
		$result = $query->result_array();
        
        // xxx' or '1'='1 -> SQL Injection
        //echo "AAA: " . $sql . "<br>";
        
        if ($result[0]['count_user_id'] != 1) {
            return false;
        } else {
            return true;
        }
	}
}