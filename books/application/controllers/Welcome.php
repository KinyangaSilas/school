<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('MY_Book');
		// $this->load->helper('url');
	}
	public function index()
	{
	$where['ApprovalStatus'] ='Approved';
	$books['books'] =$this->MY_Book->get_where($where);
	$this->load->view('header');
	$this->load->view('viewbooks',$books);
	$this->load->view('footer');
	}
}
?>