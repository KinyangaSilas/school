<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Response  extends CI_Model
{
	public $status = false;
	public $message ='';
	public $data= null;
	public $available = false;
	public $error =array();
	public function set_message($message){
		$this->message = $message;
	}
	public function set_data($data){
		$this->data= $data;
	}
	public function set_status($status =false){
		$this->status =$status;
	}
	public function set_available($available =false){
		$this->available =$available;
	}
	public function set_error($error =array()){
		$this->error =$error;
	}

}
 ?>