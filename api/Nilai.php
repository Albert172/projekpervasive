<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Nilai extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Nilai_model', 'nilai');
	}
	
	public function index_get()
	{
		$user_id = $this->get('user_id');
		//$key = $this->get('key');
		$device_id = $this->get('device_id');
		if ($user_id === null) {
			
		$nilai = $this->nilai->getNilai();
		
		} else {
		
		$nilai = $this->nilai->getNilai($user_id);

		}
		
		if ($nilai){
			
			 $this->response([
                    'data' => $nilai
                ], REST_Controller::HTTP_OK);
		}
		
		echo json_encode($nilai);
	}
	
	public function index_post()
	{
		$data = [
			'tmp' => $this->post('tmp'),
			'soil' => $this->post('soil'),
			'water' => $this->post('water'),
			'spray' => $this->post('spray')
			];
			
		if( $this->nilai->createNilai($data) > 0) 
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