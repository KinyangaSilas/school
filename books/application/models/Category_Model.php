<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_Model extends CI_Model {
	private $table;
	public $categories;
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->table ='category';
	}
	public function get_()
	{
		$data =null;
		$query = $this->db->get_where($this->table);
		return $query->result_object();
	}
	private function get_services($service =false)
	{
		$query =null;
		if($service)
		{
			$data['type'] ='service';
			$query = $this->db->get_where($this->table,$data);
		}
		else
		{
		$this->db->select('*');
        $this->db->from('type');
        $query = $this->db->get();
		}

        return $query->result();
	}
	private function get_type(){
		$this->db->select('*');
        $this->db->from('type');
        $query = $this->db->get();
        return $query->result();
	}
	public function get_subcategories($category){
		$query = $this->db->get_where('sub_category', array('category_id' =>$category));
		return $query->result_object();
	}
}