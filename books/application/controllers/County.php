<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class County extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('County_Model');
		$this->load->model('response');
	}
//Details about  counties in kenya
	public function index($api_auth_token =false,$api_user_auth_token =false)
	{
		//details about what the api does,should have authentication tokens 
	}

	public function get($county_id = false,$subcounty =false)
	{
		$response =$this->response;
		$county_id=$county_id;
		$subcounty = $subcounty;
		$onlycounty =false;
		$both =false;
		$county_data =null;
		if (isset($_POST['county_id'])) $county_id = $_POST['county_id'];
		if (isset($_POST['subcounty'])) $subcounty = $_POST['subcounty'];
		//check data
		if ($county_id == true && $subcounty == true) $both = true;
		if ($county_id != true && $subcounty ==true  || $subcounty == false) 
			{
				$both = false;
			}
		if($county_id == true && $subcounty!=true){
			$onlycounty =true;
		}
		if($both) $onlycounty =false;

		if ($both)
		{
			$county_data =$this->County_Model->get_wards($county_id,$subcounty);
			
		}
		if ($onlycounty) {
			$county_data =$this->County_Model->get_subcounties($county_id);
		}
		if ($county_id == false) {
			$county_data =$this->County_Model->get();
		}
		// $this->response->setData($this->county_model->is_allowed($id));
	
		$this->response->set_data($county_data);
		$this->response->set_status(true);
		if (!empty($this->response->data) OR $this->response->data != null)
		{
			$this->response->set_available(true);
		}
		$response_data['response'] = $response;
		$this->load->view('response',$response_data);
	}

}
?>