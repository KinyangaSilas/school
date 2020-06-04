<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {
	private $access_allowed;
	private $method ='';
	function __construct(){
		parent::__construct();
		$this->method =$_SERVER["REQUEST_METHOD"];
		$this->load->helper('url');
		$this->load->helper('email');
				// Load Database
		$this->load->database();

		$this->load->model('ProfileModel');
		$this->load->model('AnimalModel');
	}
	public function index()
	{	
	}
	public function get($id =false){
		$id =$id;
		$response =array();
		if($id>0){
		$user =$this->ProfileModel->get($id);

		if (sizeof($user)>0) {
		$animals =$this->AnimalModel->getFarmerAnimals($id);
		$response['user']= $user;
		$response['animals'] =$animals;
		}else{
			$response =null;
		}
		}else{

		}
		echo json_encode($response);
	}
	public function update($id =false){
		$response  = array();
		$success =false;
		$error =array();
		if ($this->method != 'POST') {
		$success = false;
		$error['access']	 = 'Access Mode';
		$response['message']= 'Access Denied';
		}else{
			$request= $_REQUEST;
			if ($id!=false) {
				$user_id =$id;
				if(!isset($request['county_code']) OR $request['county_code'] ==''){
					$error['county_code'] = 'County code Required';
				}else{
					$county_code =$request['county_code'];
				}
				if(!isset($request['spec']) OR $request['spec'] ==''){
					$error['spec'] = ' Specialisation Required';
				}else{
					$spec =$request['spec'];
				}
				if(!isset($request['sub_county']) OR $request['sub_county'] ==''){
					$error['sub_county'] = 'Sub County code Required';
				}else{
					$sub_county =$request['sub_county'];
				}
				if(!isset($request['ward']) OR $request['ward'] ==''){
					$error['ward'] = 'Ward code Required';
				}else{
					$ward =$request['ward'];
				}
				if(!isset($request['reg_no'])){
					if (!($spec == 'Farmer')) {
						$error['reg_no'] ='registration  number Required';
					}else{
					$reg_no ='';
					}
				}else{
					$reg_no =$request['reg_no'];
				}
				if(empty($error)) $success =true;
				if ($success) {
				$data['ward_id'] =$county_code."_".$ward;
				$data['reg_no'] =$reg_no ?: 'null';
				$data['specialisation'] =$spec;
				$data['id'] =$id;
				//update
				$this->ProfileModel->update($data);
				}

			}
			$response['errors'] =$error;
			if(empty($error)){
				$response['message']='Updated Successful';
			}
			$response['success'] =true;
		}
		echo json_encode($response);
	}
}