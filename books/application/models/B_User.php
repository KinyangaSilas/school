<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class B_User  extends CI_Model
{

	private $password,$date_created,$date_update;
	public $id,$first_name,$last_name,$phone,$email,$alt_phone,$token,$reg_no,$role,$ward_id,$specialisation;

}
?>