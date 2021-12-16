<?php

class Device_model extends CI_Model
{
	public function getDevice($device_id = null, $user_id = null)
	{
		if($device_id === null){

		return $this->db->get('device')->result_array();

		} else{
		
		return	$this->db->get_where('device', ['device_id' => $device_id])->result_array();	
		
		}
		
    }
	
	public function createUser($data)
	{
		$this->db->insert('user', $data);
		return $this->db->affected_rows();
	}
}