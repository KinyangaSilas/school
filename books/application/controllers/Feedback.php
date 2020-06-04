<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Feedback extends CI_Controller {
		function __construct()
	{
		parent::__construct();
		$this->load->model('FeedBack_Model');
		$this->load->model('response');
	}
	public function index()
	{
	// $books['books'] =$this->MY_Book->get_all();
	// $this->load->view('books',$books);
	}
	public function getFeedbacks(){
	$feedback['response'] =$this->FeedBack_Model->get_all();
	$this->load->view('response',$feedback);
	}
	public function add(){
	$_POST = json_decode(file_get_contents("php://input"),true);	
	$feedback['description'] =$_POST['description'];
	$feedback['name'] =$_POST['name'];
	$feedback['phone'] =$_POST['phone'];
	$feedback['email'] =$_POST['email'];

	if ($this->FeedBack_Model->save($feedback)) {
		$this->response->set_data($this->FeedBack_Model->get_all());
		$this->response->set_message("Save Successfully.");
		}
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);	
	// $careers['response'] =$this->Career_Model->get_();
	// $this->load->view('response',$careers);
	}
	public function getRequestDataBody()
	{
	    $body = file_get_contents('php://input');
	    if (empty($body)) {
	        return [];
	    }

	    // Parse json body and notify when error occurs
	    $data = json_decode($body, true);
	    if (json_last_error()) {
	        trigger_error(json_last_error_msg());
	        return [];
	    }

	    return $data;
}
}
?>