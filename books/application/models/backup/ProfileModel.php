<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProfileModel extends CI_Model {
    var $client_service = "frontend-client";
    var $auth_key       = "simplerestapi";

    function __construct(){
    parent::__construct();
    // Load Database
    $this->load->database();
    $this->user_table = 'users';
  }
  public function get($id){
	  $query = $this->db->get_where($this->user_table, array('id' => $id));
	  $user=$query->result_object();
    return $user;
  }
  public function update($data){
    $this->db->where('id', $data['id']);
    return $this->db->update('users', $data);;
  }
}