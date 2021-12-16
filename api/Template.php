<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Template extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Template_model', 'template');
	}
	
	public function index_get()
	{
		$user_id = $this->get('user_id');
		$template_id = $this->get('template_id');
		if ($template_id === null) {
			
		$template = $this->template->getTemplate();
		
		} else {
		
		$template = $this->template->getTemplate($template_id);
		
		}
		
		
		if ($template){
			
			 $this->response([
                    'data' => $template
                ], REST_Controller::HTTP_OK);
		}
		
		echo json_encode($template);
	}
	
	public function index_post()
	{
		$data = [
			'tmp' => $this->post('tmp'),
			'soil' => $this->post('soil'),
			'water' => $this->post('water'),
			'spray' => $this->post('spray')
			];
			
		if( $this->template->createtemplate($data) > 0) 
		{
			 $this->response([
                    'status' => TRUE,
                    'message' => 'Tambah data sukses'
                ], REST_Controller::HTTP_CREATED);
		} else {
			
			$this->response([
                    'status' => FALSE,
                    'message' => 'Tambah data gagal'
                ], REST_Controller::HTTP_BAD_REQUEST);
				
		}
	}		
}