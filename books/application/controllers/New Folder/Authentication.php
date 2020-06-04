<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authentication extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('email');
				// Load Database
		$this->load->database();

		$this->load->model('AuthenticationModel');
	}
	public function index()
	{
		echo "Hello,This is the Authentication Api";
		$data= array(

			'name'=>"AuthenticationApi",
			"vendor"=>"binax",
			"framework" =>"",
			"language" =>"PHP"
		);
	}
	public function login()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			$message =array('status' =>400 ,"message" =>"Bad Request");
			echo json_encode($message);
		} else {
			// $check_auth_client = $this->AuthenticationModel->check_auth_client();
			// echo json_encode($check_auth_client);
			// if($check_auth_client == true){
			$phone ='';
			$password ='';
			$error= array();
				$params = $_REQUEST;
		        if(!isset($params['phone'])){
		        	 $error['phone'] ='All credentials must be provied';
		        }else{
		        	$phone = $params['phone'];
		        }
		        if(!isset($params['password'])){
		        	  $error['password'] ='All credentials must be provied';
		        }else{
		        	$password = $params['password'];
		        }
		        	
		        $response = $this->AuthenticationModel->login($phone,$password);
				//echo $response;
				// json_output($response['status'],$response);
			// }
		}
	}
	public function logout()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        $response = $this->MyModel->logout();
				json_output($response['status'],$response);
			}
		}
	}
	public function register(){
		$method = $_SERVER['REQUEST_METHOD'];
		$request = $_REQUEST;
		$response  = array();
		$error =array();
		$success =false;

		if ($method != 'POST') {
			$response['success'] =false;
			$response['message'] ="bad request";
		}else{
			$first_name ="";
			$last_name = "";
			$phone ="";
			$email ="";
			$password ="";
			$role ="";
			if (!isset($request['first_name'])) {
				$error['first_name'] ="first name required";
				$success =false;
			}else{
				$first_name = $request['first_name'];
			}
			if (!isset($request['last_name'])) {
				$error['last_name'] ="Last name required";
				$success =false;
			}else{
				$last_name = $request['last_name'];
			}
			if (!isset($request['phone'])) {
				$error['phone'] ="Phone Number name required";
				$success =false;
			}else{
				$phone = $request['phone'];
			}
			if (!isset($request['email'])) {
				$error['email'] ="Email required";
				$success =false;
			}else{
				$email = $request['email'];
			}
			
			if (!isset($request['password'])) {
				$error['password'] ="Password required";
				$success =false;
			}else{
				$password = $request['password'];
			}
			if (!isset($request['role'])) {
				$error['role'] ="Role must be selected";
				$success =false;
			}else{
				$role = $request['role'];
			}

			$data["first_name"] =$first_name;
			$data['last_name']  =$last_name;
			$data['password']   =$password;
			$data['phone']		=$phone;
			$data['email']		=$email;
			$data['role']		=$role;

			if ($first_name != "" and  $last_name !='' and $password !='' and $phone !='' and  $email !='' and  $role !='') $success =true;
			if ($success)
			{
			 // Check if the given email already exists
            $con['returnType'] = 'count';
            $con['conditions'] = array(
                'phone' => $phone,
            );
            $userCount = $this->AuthenticationModel->getRows($con);
            if ($userCount>0) {
            	$success =false;
            	$error["phone_exist"] ="Phone already registered";
            	$response['error'] = $error;
				$response['success'] = $success;
				$response['message'] = "could not register user";
            }else{            
			//insert to table
            	$insert = $this->AuthenticationModel->insert($data);
            	if ($insert) {
            		$response['message'] ="Registered Succesfully";
            		$response['success'] =true;
            	}else{
            		$response['message'] ="could not registered Succesfully";
            		$response['success'] =false;
            	}
            }

			}else{
				$response['error'] = $error;
				$response['success'] = $success;
				$response['message'] = "could not register user";
			}

		}
		//load view to echo the view
		echo json_encode($response);
	}
	
}