<?php

class Nilai_model extends CI_Model
{
	
	public function getNilai($user_id = null, $key = null, $device_id = null)
	{
		if ($user_id === null){
		return $this->db->get('nilai')->result_array();
		
		} else if($user_id == 2){

		$query = $this->db->query("SELECT *
                  FROM nilai
                  WHERE user_id = 1
                  and device_id = 1
				  ");
		$row = $query->result_array();

		return $row; 
		} else if ($user_id){
		
		$this->db->where('user_id', $user_id);
		// here we select every column of the table
		$array = $this->db->get('nilai')->result_array();
		//$array = $this->db->get('nilai', ('user_id' => $user_id))->result_array();

		return $array;
		//return	$this->db->where('nilai', ['user_id' => $user_id],['key' => $key])->result_array();
		
		}
		
    }
	
	public function createNilai($data)
	{
		$this->db->insert('nilai', $data);
		return $this->db->affected_rows();
	}
}