<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_Model extends CI_Model {
private $query =null;
private $table;
function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->table ='users';
}

public function login($data)
{
	$query = $this->db->get_where($this->table, $data);
	$this->set_query($query);
	if ($query->num_rows() == 1) return true;
		return false ;
}
public function get_contact($id)
{
	$query = $this->db->get_where($this->table, array('id' =>$id));
	$this->set_query($query);
	if ($query->num_rows() == 1) return true;
		return false ;
}
public function get_by_id($id)
{
	$query = $this->db->get_where($this->table, array('id' =>$id));
	$this->set_query($query);
	if ($query->num_rows() == 1) return true;
		return false ;
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
public function _exists($field,$value)
{
    $this->db->where($field,$value);
    $query = $this->db->get($this->table);
   return !empty($query->result_array());
}
// public function get($params){
// 	        if(array_key_exists("conditions",$params)){
//             foreach($params['conditions'] as $key => $value){
//                 $this->db->where($key,$value);
//             }
//         }
//         return $this->db->get();
// }

    public function get_specialiation(){
        $query = $this->db->get('specialisation');
       $rows=$query->result_object();
        return $rows;
	}
	public function update($data){
    $this->db->where('id', $data['id']);
    return $this->db->update('users', $data);;
  }
//$query setter and getter
	private function set_query($query){$this->query =$query;}
	public function get_query(){	return $this->query;}

}