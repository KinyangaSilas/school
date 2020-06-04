<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Animal_Model extends CI_Model {
	private $table;
	function __construct()
	{
		parent::__construct();
		$this->table = 'animal';
		$this->load->database();
	}
	public function insert($data)
	{
 
        $insert = $this->db->insert($this->table, $data);
        if ($insert)
        {
           return $this->db->insert_id();
        } 
        else 
        {
            return false;
        }
	}
	public function get_animals(){
		$this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        $this->set_query($query);
        return $query->num_rows();
	}
	public function get_by_id($id){
		$query = $this->db->get_where($this->table, array('id' =>$id));
		$this->set_query($query);
		if ($query->num_rows() == 1) return true;
			return false ;
	}
	public function get_by_($data){
		$query = $this->db->get_where($this->table, $data);
			$this->set_query($query);
		if ($query->num_rows() == 1) return true;
		return false ;
	}
	function sale_enter($sell_data)
	{
        $insert = $this->db->insert('sale', $sell_data);
        if ($insert)
        {
           return $this->db->insert_id();
        } 
        else 
        {
            return false;
        }
	}
	public function _exists($animal_id)
	{
		if ($animal_id == '' OR $animal_id == null OR $animal_id ==false)return false;
		return $this->get_by_id($animal_id);
	}
	public function _update($data,$where){
        $this->db->where($where);
       return $this->db->update($this->table, $data);
    }
    public function get_market()
    {
    $sql ="SELECT DISTINCT animal.id,animal.name,animal.pic,sale.sell_status,animal.owner_id,animal.breed, category.name as category, sale.amount,sale.contact_status FROM ( ( animal INNER JOIN category ON animal.category =category.id ) INNER JOIN sale ON animal.owner_id = sale.seller_id and animal.sell_status = sale.sell_status)";

    	$query = $this->db->query($sql);
        $this->set_query($query);
       if ($query->num_rows() >= 1) return true;
		return false ;
    }
    public function get_bull($data){
		$query = $this->db->get_where('bull', $data);
		$this->set_query($query);
		if ($query->num_rows() == 1) return true;
		return false ;
	}
	public function statistics($id){
		$this->db->where('animal.owner_id',$id);
		$this->db->select('category.name,count(animal.category) as count ,category',false)
         ->from($this->table)
         ->group_by('animal.category');
  	return $this->db->join('category','animal.category=category.id','left')
         ->get()
         ->result();
	}
	private function set_query($query){$this->query =$query;}
	public function get_query(){	return $this->query;}
	public function statistics2($id){
 
      $this->db->where('animal.owner_id',$id);
		$this->db->select('category.name,count(animal.category) as count ,category',false)
         ->from($this->table)
         ->group_by('animal.breed');
      	$this->db->join('breed', 'breed.breed_id = animal.breed');
     return $this->db->join('category', 'breed.breed_id = category.id','left')    
      	 ->get()
         ->result();
	}

}
