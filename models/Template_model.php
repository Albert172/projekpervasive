<?php

class Template_model extends CI_Model
{
	public function getTemplate($template_id = null, $user_id = null)
	{
		if($template_id === null){

		return $this->db->get('template')->result_array();

		} else{
		
		return	$this->db->get_where('template', ['template_id' => $Template_id])->result_array();	
		
		}
		
    }
	
	public function createTemplate($data)
	{
		$this->db->insert('template', $data);
		return $this->db->affected_rows();
	}
}