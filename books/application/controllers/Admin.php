<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('MY_Book');
	}
	public function index()
	{
	$this->MY_Book->dbfields();
	var_dump($_SESSION["NAME"]);
	}
	// public function doInsert(){
		
	// }
}
?>