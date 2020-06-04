<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends CI_Model {
    var $client_service = "frontend-client";
    var $auth_key       = "simplerestapi";

    function __construct(){
    parent::__construct();
    // Load Database
    $this->load->database();
    $this->user_table = 'users';
  }
  public function getUsers($specialisation =false){
  	$response  = array();
  	if(!$specialisation){
	   $this->db->select('*');
	   $this->db->from($this->user_table);
       $query = $this->db->get();
       $response['users'] = $query->result_array();
   }else{
	   	$query = $this->db->get_where($this->user_table, array('specialisation' => $specialisation));
	   	$response['users'] =$query->result_object();
   }
   echo json_encode($response);
  }
  public function getSpecialiation(){
          $query = $this->db->get('specialisation');
        $rows=$query->result_object();
        return $rows;
}
  public function get($id){
      $query = $this->db->get_where($this->user_table, array('id' => $id));
      return $query->result_object();
  }
   public function getContact($id){
      $query = $this->db->get_where($this->user_table, array('id' => $id));
      $q = $this->db->select('id,first_name,last_name,phone,email')->from($this->user_table)->where('id',$id)->get();
      return $q->result_object();
  }
}