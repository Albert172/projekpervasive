<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class User extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
	}
	
	public function index_get()
	{
		$user_id = $this->get('user_id');
		if ($user_id === null) {
			
		$user = $this->user->getUser();
		
		} else {
		
		$user = $this->user->getUser($user_id);
		
		}
		
		
		if ($user){
			
			 $this->response([
                    'data' => $user
                ], REST_Controller::HTTP_OK);
		}
		
		echo json_encode($user);
	}
	
	public function index_post()
	{
		$data = [
			'tmp' => $this->post('tmp'),
			'soil' => $this->post('soil'),
			'water' => $this->post('water'),
			'spray' => $this->post('spray')
			];
			
		if( $this->user->createuser($data) > 0) 
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