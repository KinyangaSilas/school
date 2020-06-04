<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment_Model  extends CI_Model
{
	private $table;
	private $query =null;

	function __costruct ()
	{
		parent::__costruct();
		$this->load->database();
		$this->table = 'users';
	}
	public function validate($data){
		return true;
	}

	private function set_query($query){$this->query =$query;}
	public function get_query(){	return $this->query;}
}