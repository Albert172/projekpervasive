<?php

class User_model extends CI_Model
{
	public function getUser($user_id = null)
	{
		if($user_id === null){

		return $this->db->get('user')->result_array();

		} else{
		
		return	$this->db->get_where('user', ['user_id' => $user_id])->result_array();	
		
		}
		
    }
	
	public function createUser($data)
	{
		$this->db->insert('user', $data);
		return $this->db->affected_rows();
	}
}