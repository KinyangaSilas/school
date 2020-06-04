<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class County extends CI_Controller {
	private $access_allowed;
	private $method ='';
	function __construct(){
		parent::__construct();
		$this->method =$_SERVER["REQUEST_METHOD"];
		$this->load->helper('url');
		$this->load->helper('email');
				// Load Database
		$this->load->database();

		$this->load->model('CountyModel');
		
	}
	public function index()
	{
		$counties =$this->CountyModel->get();
		echo json_encode($counties);
	}
	public function get($id = false,$subcounty =false){
		$response =array();
		$id =$id;
		if ($this->method != 'POST') {
		$response['success'] =false;
		$error['access']	 = 'Access Mode';
		$response['message']= 'Access Denied';
		}else{
			//check not data given
			if ($id == false && $subcounty == false) {
				// return counties
				$counties =$this->CountyModel->get();
				$response['success'] =true;
				$response['counties'] =$counties;
			}else if($id!=false && $subcounty!=false){
				// return wards in subcounty
				$wards =array();
				if($id>0 && $id<48){
				$wards =$this->CountyModel->getWards($id,$subcounty);
					}
				$response['success'] =true;
				$response['wards'] =$wards;
			}else if($id!=false && $subcounty==false){
				$sub_counties =array();
				if($id>0 && $id<48){
				$sub_counties =$this->CountyModel->getSubCounties($id);
				}
				$response['success'] =true;
				$response['sub_counties'] =$sub_counties;
			}
		}
		//load view for this
		echo json_encode($response);
	}
}