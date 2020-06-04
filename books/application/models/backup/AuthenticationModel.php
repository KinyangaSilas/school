<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AuthenticationModel extends CI_Model {
    var $client_service = "frontend-client";
    var $auth_key       = "simplerestapi";

    function __construct(){
    parent::__construct();
    // Load Database
    $this->load->database();
    $this->user_table = 'users';
  }
    public function check_auth_client(){
        // $client_service = $this->input->get_request_header('Client-Service', TRUE);
        // $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);
        
        // if($client_service == $this->client_service && $auth_key == $this->auth_key){
        //     return true;
        // } else {
        //     // return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        // }
    }
    public function login($username,$password)
    {
      $message = array();
        // $users  = $this->db->select('password,id')->from('users')->where('phone',$username)->get()->rows();
      $query = $this->db->query('select * from users where `phone` = "'.$username.'" and `password` = "'.$password.'"');
      $num_rows =$query->num_rows();
if($num_rows==1){
$message["user"] =$query->row();
$message['success'] =true;
$message['message'] ="Successfully logged";
}else if ($num_rows>1) {
  $message["error"] ="N101"; 
  $message['success']=false;
  $message['message']="Login Failure";
}else{
  $message['success'] =false;
  $message['message'] ="Wrong credentials provide";
  $message['username'] =$username;
  $message['password'] =$password;
}
    
echo json_encode($message);
    }
    public function logout()
    {
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $this->db->where('users_id',$users_id)->where('token',$token)->delete('users_authentication');
        return array('status' => 200,'message' => 'Successfully logout.');
    }
    public function auth()
    {
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $q  = $this->db->select('expired_at')->from('users_authentication')->where('users_id',$users_id)->where('token',$token)->get()->row();
        if($q == ""){
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        } else {
            if($q->expired_at < date('Y-m-d H:i:s')){
                return json_output(401,array('status' => 401,'message' => 'Your session has been expired.'));
            } else {
                $updated_at = date('Y-m-d H:i:s');
                $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
                $this->db->where('users_id',$users_id)->where('token',$token)->update('users_authentication',array('expired_at' => $expired_at,'updated_at' => $updated_at));
                return array('status' => 200,'message' => 'Authorized.');
            }
        }
    }
   
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->user_table);
        
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
                $result = ($query->num_rows() > 0)?$query->result_array():false;
            }
        }

        //return fetched data
        return $result;
    }
    public function insert($data){
        //add created and modified date if not exists
        // if(!array_key_exists("date_created", $data)){
        //     $data['date_created'] = date("Y-m-d H:i:s");
        // }
        // if(!array_key_exists("date_updated", $data)){
        //     $data['date_updated'] = date("Y-m-d H:i:s");
        // }
        
        //insert user data to users table
        $insert = $this->db->insert($this->user_table, $data);
        
        //return the status
        return $insert?$this->db->insert_id():false;
    }
}
?>