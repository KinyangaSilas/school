<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	private $method ='';

	function __construct()
	{
		parent::__construct();
		$this->method =$_SERVER["REQUEST_METHOD"];
		$this->load->model('response');
		$this->load->model('Category_Model');

	}
	function index($api_auth_key=false,$category=false)
	{
	$this->response->set_data($this->Category_Model->get_());
	$this->response->set_status(true);
	if (!empty($this->response->data) OR $this->response->data != null)
	{
			$this->response->set_available(true);
	}
	$data_view['response'] = $this->response;
	$this->load->view('response',$data_view);
	}
	public function get($app_auth_key =false,$category= false)
	{
		$this->app_auth_key = $app_auth_key;
		$category =$category;
		if(isset($_POST['app_auth_key'])) $this->app_auth_key = $_POST['app_auth_key'];
		if(isset($_POST['category'])) $category= $_POST['category'];
		if(isset($_POST['owner_id'])) $owner_id= $_POST['owner_id'];

		$this->response->set_data($this->Category_Model->categories);
		// $this->response->set_available(true);
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
	public function subcategories($app_auth_key =false,$category_id= false){
		$this->app_auth_key = $app_auth_key;
		$category_id =$category_id;
		if(isset($_POST['category_id'])) $category_id= $_POST['category_id'];
		$this->response->set_data($this->Category_Model->get_subcategories($category_id));
		$this->response->set_available(true);
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}


}