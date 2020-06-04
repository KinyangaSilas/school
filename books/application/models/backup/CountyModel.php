<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CountyModel extends CI_Model {
    var $client_service = "frontend-client";
    var $auth_key       = "simplerestapi";
    var $access_allowed =false;
    var $folder ='application/models/ke/';

    function __construct(){
    parent::__construct();
    // Load Database
    $this->load->database();
    $this->table= 'county';
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

     public function getSubCounties($id){
       $county_file = $this->folder.''.$id.'.json';
       $data = json_decode(file_get_contents($county_file));
       $sub_counties =array();
       foreach ($data as $key => $value) {
          $sub_county =array();
          $sub_county['county_code'] =$id;
          $sub_county['name'] =$value->constituency;
        if (!in_array($sub_county, $sub_counties)) {
        array_push($sub_counties,$sub_county);
        }
       }
       return $sub_counties;
    }
    public function getWards($id,$name){
       $county_file = $this->folder.''.$id.'.json';
       $data = json_decode(file_get_contents($county_file));
       $wards =array();
       $str = str_replace('%20', ' ', $name);
       foreach ($data as $key => $value) {
        if($value->constituency ==$str){
          $ward =array();
          $ward['id'] =$value->_id;
          $ward['name'] =$value->name;
         array_push($wards,$ward);
        }
       }
       return $wards;
    }
    public function get(){
      //return all counties and their county code
      $folder =$this->folder.'counties.json';
      $data = json_decode(file_get_contents($folder));
      return $data;
    }
  }
  ?>