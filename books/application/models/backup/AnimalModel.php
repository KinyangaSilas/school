<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AnimalModel extends CI_Model {
    var $client_service = "frontend-client";
    var $auth_key       = "simplerestapi";
    var $access_allowed =false;

    function __construct(){
    parent::__construct();
    // Load Database
    $this->load->database();
    $this->table= 'animal';
  }
  function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach($params['conditions'] as $key => $value){
                $this->db->where($key,$value);
            }
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();    
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->row_array():false;
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_object():false;
            }
        }
        //return fetched data
        return $result;
    }
    public function insert($data){
        $table;
        if (isset($data['table'])) {
            $table =$data['table'];
        }else{
            $table = $this->table;
        }
        unset($data['table']);
        //insert user data to animal table
        $insert = $this->db->insert($table, $data);
        
        //return the status
        return $insert?$this->db->insert_id():false;
    }
    public function getAnimals(){
        $animals =$this->getRows();
        return $animals;
    }
    public function getBulls(){
        $this->db->select('*');
        $this->db->from('bull');
        $query =$this->db->get();
        $rows=$query->result_object();
        return $rows;
    }
    public function getMates($id){
        $fathers =array();
        $id = $id;
        $query = $this->db->get_where('bull',array('ai_code != ' =>$id));
        $rows=$query->result_object();
        // do{
        // $animal =$this->get($id);
        // $id =$this->getFather($animal);
        // array_push($fathers, $id);
        // $id =$id;
        //  break;
        // }while($id !=0 OR $id != $id);
        return $rows;
       }

    public function getFather($data){
        return $data['sire'];
     }
     public function getCategories($category =false){
        $rows =null;
        if(!$category && $category !==0){
        $this->db->select('*');
        $this->db->from('category');
        $query =$this->db->get();
        $rows=$query->result_object();
        }else{
        $query = $this->db->get_where('breed',array('category_id' =>$category));
        $rows=$query->result_object();
        }
        return $rows;
    }
    public function getFarmerAnimals($farmer_id){
        $query = $this->db->get_where('animal',array('owner_id' =>$farmer_id, 'sell_status'=>0));
        $rows=$query->result_object();
        return $rows;
    }
    public function get($id){
        $query=$this->db->get_where('animal',array('id' =>$id));
        $row =$query->row_array();
        return $row;
    }
    public function getMales(){
     $query = $this->db->get_where('animal',array('gender' =>'1'));
        $rows=$query->result_object();
        return $rows;
    }
    public function getf($id){
        $query = $this->db->get_where('parents',array('child' =>$id));
        $row=$query->row_array();
        return $row;
    }
     public function getfb($ai_code){
        $query = $this->db->get_where('bull',array('ai_code' =>$ai_code));
        $row=$query->row_array();
        return $row;
    }
    public function getFathers($id){
        $fathers =array();
        $id =$id;
        $level =10;
        while($level>0){
        // //get the child by id in level x > 0
        $child =$this->getf($id);
        // //get father id
        $f_id =$child['Father'];
        //check id is itself and then set level to 0

        if($id == $f_id OR $f_id ==0 ){
            array_push($fathers, $f_id);
            $level =0;
        }else{
            array_push($fathers, $f_id);
            $level--;
        }
       
        $id = $f_id;
        }
        return $fathers;
    }
    public function getMFathers($id){
        $child =$this->getf($id);
        // //get father id
        $m_id =$child['Mother'];
        $fathers =array();
        array_push($fathers, $m_id);
        $id =$m_id;

        $level =10;
        while($level>0){
        // //get the child by id in level x > 0
        $child =$this->getf($id);
        // //get father id
        $f_id =$child['Father'];
            if($f_id!=null){
                  //check id is itself and then set level to 0
                    if($id == $f_id OR $f_id ==0 ){
                        array_push($fathers, $f_id);
                        $level =0;
                    }else{
                        array_push($fathers, $f_id);
                        $level--;
                    }
                    $id = $f_id;
            }else{
                $level =0;
                array_push($fathers, '0');
            }
        }
        return $fathers;
    }
    public function getmates_from_all($fathers =array()){
        $query = $this->db->get('parents');
        $rows=$query->result_object();
        return $rows;
    }
    public function getSiblings($id){
        $child =$this->get($id);
        $mother_id = $child['dam'];
        $siblings =array();
        $siblings_id =array();
            if ($mother_id == 0 or $mother_id == null) {
                $siblings = null;
            }else{
                $query =$this->db->get_where('animal',array('dam' =>$mother_id));
                $siblings =$query->result_object();
                foreach ($siblings as $sibling => $value) {
                array_push($siblings_id, $value->id);
                }
            }
        return $siblings_id;
    }
    public function getbFathers($id){
        $fathers =array();
        $child =$this->get($id);
        $ai_code = $child['sire'];
        $ai_code =$ai_code;
        $level =10;
            do{
                $child =$this->getfb($ai_code);
                $sire =$child['sire'];  
                  $ai_code =$sire;
                    if ($ai_code == null) {
                        $level =0;
                    }else{
                     array_push($fathers, $sire);
                    }
                $level--;         
            }while($level>0);
        return $fathers;
    }
    public function getBullSiblings($id){
        $child =$this->get($id);
        $mother_id = $child['dam'];
        $siblings =array();
        $siblings_id =array();
            if ($mother_id == 0 or $mother_id == null) {
                $siblings = null;
            }else{
                $query =$this->db->get_where('bull',array('dam' =>$mother_id));
                $siblings =$query->result_object();
                foreach ($siblings as $sibling => $value) {
                array_push($siblings_id, $value->ai_code);
                }
            }
        return $siblings_id;
    }
    public function getFrom($table,$id){
        $animal =null;
        if ($table =='bull') {
            $query =$this->db->get_where('bull',array('ai_code' =>$id));
            $animal =$query->result_object();
        }else if ($table =='animal') {
            $query =$this->db->get_where('animal',array('id' =>$id));
            $animal =$query->result_object();
        }
        return $animal;
    }
    public function getAnimalsInMarket(){
        $query = $this->db->get_where('animal',array('sell_status' =>1));
        $rows=$query->result_object();
        return $rows;
    }
    public function sell($data,$where){
        $this->db->where($where);
       return $this->db->update('animal', $data);
    }
    public function transfer($owner_id=false,$buyer_id=false,$animal_id=false)
    {
        $udata['owner_id'] = $buyer_id;
        $where =array('id' => $animal_id);
       $this->db->where($where);
       return $this->db->update('animal', $udata);
        $this->db->where($where);
        $data['table'] = 'sale';
        $data['seller_id'] = $owner_id;
        $data['buyer_id'] = $buyer_id;
        $data['animal_id'] =$animal_id;
        $data['status'] = 3;
        $this->insert($data);
    }
  }
  ?>