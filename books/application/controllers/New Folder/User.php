<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	private $access_allowed;
	private $method ='';
	function __construct(){
		parent::__construct();
		$this->method =$_SERVER["REQUEST_METHOD"];
		$this->load->helper('url');
		$this->load->helper('email');
				// Load Database
		$this->load->database();

		$this->load->model('UserModel');
		
	}
	public function index()
	{

	}
	public function get($specialisation =false){
		$response =array();
		if (!$specialisation) {
			$response['users'] =$this->UserModel->getUsers();
		}else{
			$specialisation =  str_replace('%20', ' ', $specialisation);
			$response['users'] =$this->UserModel->getUsers($specialisation);
		}
		echo json_encode($response);
	}
	public function specialisation(){
		$sp = $this->UserModel->getSpecialiation();
		$response =array();
		$response['success'] =true;
		$response['spec'] = $sp;
		echo json_encode($response);
	}
public function contact($id =	false){
		$response =array();
		$user =$this->UserModel->getContact($id);
		if($user){
			$response['success']	=	TRUE;
			$response['user']		=	$user;
		}else{
			$response['success']	=	false;
			$response['user']		=	null;
		}

		echo json_encode($response);
	}
}