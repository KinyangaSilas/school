<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service extends CI_Controller {

	private $method ='';

	function __construct()
	{
		parent::__construct();
		$this->method =$_SERVER["REQUEST_METHOD"];
		$this->load->model('Service_Model');
		$this->load->model('response');
	}
	public function index($api_auth_key=false)
	{
		$service =null;
		$is_available = $this->Service_Model->get();
		$controller_data = $this->Service_Model->get_query();
		$service = $controller_data->result_object();

		$this->response->set_data($service);
		$this->response->set_status(true);
		if (!empty($this->response->data) OR $this->response->data != null)
		{
			$this->response->set_available(true);
		}
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
	public function get($api_auth_key=false,$service =false)
	{
		$data= array();
		$type_of_service =null;
		$service  = null;
		if (isset($_POST['type_of_service']))
		{
			$type_of_service  = $_POST['type_of_service'];
		}

		if ($type_of_service !== null && $type_of_service !== '')
		{
			$data['specialisation'] = $type_of_service;
		}

		if (isset($data['specialisation']))
		{
		$is_available = $this->Service_Model->get_provider($data);
		$controller_data = $this->Service_Model->get_query();
		$service = $controller_data->result_object();
		}
		// $this->response->set_error($error);
		$this->response->set_data($service);
		$this->response->set_status(true);
		if (!empty($this->response->data) OR $this->response->data != null)
		{
			$this->response->set_available(true);
		}
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
	public function equipments($category  = false){
		$category;
		$this->response->set_status(true);
		if(isset($_POST['category'])) $category = $_POST['category'];
		if ($category ==='' || $category === null) 
		{
			$this->response->set_data(null);
		}
		else
		{
		$is_available = $this->Service_Model->get_equipments($category);
		$controller_data = $this->Service_Model->get_query();
		$equipments = $controller_data->result_object();
		$this->response->set_data($equipments);
		}
		if (!empty($this->response->data) OR $this->response->data != null)
		{
			$this->response->set_available(true);
		}
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
	public function products($category  = false){
		$this->response->set_status(true);
		$is_available = $this->Service_Model->get_products(null);
		$controller_data = $this->Service_Model->get_query();
		$products = $controller_data->result_object();
		$this->response->set_data($products);
		if (!empty($this->response->data) OR $this->response->data != null)
		{
			$this->response->set_available(true);
		}
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
}
