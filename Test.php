<?php

Class Test extends CI_Controller
{
    
    public function index()
	{
		//$url = 'http://localhost/rest_api/api/nilai';
		
		//$ch = curl_init($url);
		
		//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		//$result = curl_exec($ch);
		
		//curl_close($ch);
		

		// persiapkan curl
		$ch = curl_init(); 

		// set url 
		curl_setopt($ch, CURLOPT_URL, "http://localhost/rest_api/api/nilai?X-API-KEY=test");
		//curl_setopt($ch, CURLOPT_URL, "http://localhost/rest_api/api/user");
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_USERPWD, "admin" . ":" . "1234");  
		// return the transfer as a string 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

		// $output contains the output string 
		$output = curl_exec($ch); 
		$output1 = curl_exec($ch); 
		// tutup curl 
		curl_close($ch);    

		$output = json_decode($output, TRUE);

		// menampilkan hasil curl
	//	echo "<pre>";
	//	print_r($output1);
	//	echo "</pre>";


	//	$content = file_get_contents("http://localhost/rest_api/api/nilai?X-API-KEY=test&id=10&key=coba");
		
	//	$content = utf8_encode($content);
		
	//	$hasil = json_decode($content, true);
		
		$data = array(
			'data_nilai' => $output['data'],
			);
		
		//echo "<pre>";
		//print_r($data['data_nilai']);
		//echo "</pre>";

		
		$this->load->view('test_view', $data);
		
		//$users = json_encode($users);
		
		//$users = array();
		//$users["email"] = $_POST['email'];
		//$users["password"] = $_POST['password'];
		
		//echo "<pre>";
		//print_r ($users);
		//echo "</pre>";

		}
	
}

?>