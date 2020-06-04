<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Subject extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('MY_Subject');
		$this->load->model('response');
		$this->load->helper('url');
	}
	public function index()
	{
	// $books['books'] =$this->MY_Subject->get_all();
	// $this->load->view('books',$books);
	}
	public function add(){
		if (isset($_POST['SubjectName'])) {
		$Subject['SubjectName'] =$_POST['SubjectName'];
		$Subject['CreatedBy'] =$_POST['CreatedBy'];
		$Subject['ApprovalStatus'] ='Pending';
		if ($this->MY_Subject->save($Subject)) {
			$this->response->set_data($Subject);
			$this->response->set_message("Save Successfully.Awaiting Approval");
		}
		}
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);	
	}
	public function getAll(){
	$subjects['subjects'] =$this->MY_Subject->get_all();
	$this->load->view('subjects',$subjects);
	}
	public function getList(){
	$subjects['response'] =$this->MY_Subject->get_all();
	$this->load->view('list',$subjects);
	}
	public function view(){
	$where['ApprovalStatus'] ='Approved';
	$where['ApprovalStatus'] ='Pending';
	$subjects['subjects'] =$this->MY_Subject->get_where($where);
	$this->load->view('header');
	$this->load->view('viewSubjects',$subjects);
	$this->load->view('footer');
	}
}
?>