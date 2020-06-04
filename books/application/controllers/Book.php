<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Book extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('MY_Book');
		$this->load->model('response');
		$this->load->helper('url');
	}
	public function index()
	{
	// $books['books'] =$this->MY_Book->get_all();
	// $this->load->view('books',$books);
	}
	public function add(){
		$Book['BookCover'] ='';
		$Book['BookLocation'] ='';
		if(isset($_FILES["BookCover"]["name"]) && isset($_FILES["BookLocation"]["name"])) 
		{
			    $config['upload_path'] = './uploads/cover/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                $this->load->library('upload', $config); 
                if(!$this->upload->do_upload('BookCover'))  
                {  
                     echo $this->upload->display_errors();  
                     exit();
                }  
                else  
                {  
                     $data = $this->upload->data();  
                   $Book['BookCover'] ='uploads/cover/'.$data["file_name"]; 
                }  
                $config2['upload_path'] = './uploads/books/';  
                $config2['allowed_types'] = 'doc|pdf';  
                $this->upload->initialize($config2);
                if(!$this->upload->do_upload('BookLocation'))  
                {  
                     echo $this->upload->display_errors(); 
                     exit(); 
                }  
                else  
                {  
                     $data = $this->upload->data(); 
                      $Book['BookLocation'] ='uploads/books/'.$data["file_name"]; 
                     // echo '<img src="'.base_url().'uploads/cover/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
                }  
			
		}else{
			echo "File Missing";
		}
		$Book['BookTitle'] =$_POST['BookTitle'];
		$Book['BookPrice'] =$_POST['BookPrice'];
		$Book['CreatedBy'] =$_POST['CreatedBy'];
		$Book['ApprovalStatus'] ='Pending';
		if ($this->MY_Book->save($Book)) {
			$this->response->set_data($Book);
			$this->response->set_message("Save Successfully.Awaiting Approval");
		}
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);	
	}
	public function getAll(){
	$books['books'] =$this->MY_Book->get_all();
	$this->load->view('books',$books);
	}
	public function view(){
	// $where['ApprovalStatus'] ='Approved';
	$where['ApprovalStatus'] ='Pending';
	$books['books'] =$this->MY_Book->get_where($where);
	$this->load->view('header');
	$this->load->view('viewbooks',$books);
	$this->load->view('footer');
	}
}
?>