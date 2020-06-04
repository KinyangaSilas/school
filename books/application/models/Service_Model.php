<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service_Model extends CI_Model {
	private $table;
	function __construct()
	{
		parent::__construct();
		$this->table = 'service';
		$this->load->database();
	}
	public function get(){
		$this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        $this->set_query($query);
        return $query->num_rows();
	}
	public function get_provider($data){
	$query = $this->db->get_where('users', $data);
	$this->set_query($query);
	if ($query->num_rows()>= 1) return true;
		return false ;
	}
	public function get_equipments($data){
	$query = $this->db->get_where('machinery', array('category' => $data));
	$this->set_query($query);
	if ($query->num_rows()>= 1) return true;
		return false ;
	}
	public function get_products($data){
	$query = $this->db->get_where('products', array('sell_status' =>'ENTERED'));
	$this->set_query($query);
	if ($query->num_rows()>= 1) return true;
		return false ;
	}
	private function set_query($query){$this->query =$query;}
	public function get_query(){return $this->query;}

}
