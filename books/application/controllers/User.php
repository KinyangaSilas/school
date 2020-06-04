<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	private $app_auth_key;
	function __construct(){
		parent::__construct();
		$this->load->model('User_Model');
		$this->load->model('Animal_Model');
		$this->load->model('response');
		$this->load->model('B_User');
		$this->load->model('B_Contact');
		$this->load->model('B_Animal');
	}
	public function index($app_auth_key =false)
	{
		// if ($is_api) {
			
		// }else{
		// 	$this->load->view('user/home');
		// }
	}

// login functions
	public function login($app_auth_key =false){
		$method = $_SERVER['REQUEST_METHOD'];
		$error =array();
		$data  = array();
		$data_view = array();
		$login =false;
			$params = $_REQUEST;
			$this->response->set_status(true);
		// 	//get the credentials
		        if(!isset($params['phone']))
		        {
		        	 $error['phone'] ='All credentials must be provided';
		        }
		        else
		        {
		        	$phone = $params['phone'];
		        	$data['phone'] = $phone;
		        }
		        //get password
		        if(!isset($params['password']))
		        {
		        	  $error['password'] ='All credentials must be provided';
		
		        }
		        else
		        {
		        	$password = $params['password'];
		        	$data['password'] = $password;
		        }
		        if (!empty($error)) {
		        	// error
		        	$this->response->set_message('error');
		        }
		        else
		        {
		        	//no error.Proceed to login
		        	$login=$this->User_Model->login($data);
		        	$controller_data =$this->User_Model->get_query();
		        	if ($login) {
		        	 	$this->response->set_status(true);
				       	$this->response->set_message('Logged  Succesfully');
				       	$this->response->set_data($controller_data->result('B_User'));
				       	$this->response->set_available($login);
		        	 }
		        	 else
		        	 {
		        	 	//causes
		        	 	$num_rows =$controller_data->num_rows();
		        		 //zero users
		        			if ($num_rows == 0) 
		        			{
		        				//no users
						        $this->response ->set_status(true);
							    $this->response->set_message('Log in Failed.Wrong Credentials');
							    $this->response->set_available(false);
		        			}
		        			elseif ($num_rows>=2)
		        			{
		        				//multiple users
		        				$this->response ->set_status(true);
						    	$this->response->set_message('Log in Failed.Contact Administrator');
						    	$this->response->set_available(false);
		        			}
		        			else
		        			{
		        				//unknown
		        				$this->response ->set_status(true);
						    	$this->response->set_message('Log in Failed.Contact Admin');
						    	$this->response->set_available(false);
		        			}
		        	}

		        }

		if(!empty($error))  $this->response->set_error($error);
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
	// login functions
	
	public function register($app_auth_key =false){
		$method = $_SERVER['REQUEST_METHOD'];
		$request = $_REQUEST;
		$response  = array();
		$error =array();
		$success =false;
		$data_view =array();

		if ($method != 'POST') {
			$response['success'] =false;
			$response['message'] ="bad request";
		}else{
			$first_name ="";
			$last_name = "";
			$phone ="";
			$email ="";
			$password ="";
			$role ="";
			$specialisation="";
			if (!isset($request['first_name'])) {
				$error['first_name'] ="first name required";
			}else{
				$first_name = $request['first_name'];
			}
			if (!isset($request['last_name'])) {
				$error['last_name'] ="Last name required";
			}else{
				$last_name = $request['last_name'];
			}
			if (!isset($request['phone'])) {
				$error['phone'] ="Phone Number name required";
			}else{
				$phone = $request['phone'];
			}
			if (!isset($request['email'])) {
				$error['email'] ="Email required";
			}else{
				$email = $request['email'];
			}
			
			if (!isset($request['password'])) {
				$error['password'] ="Password required";
			}else{
				$password = $request['password'];
			}
	//		if (!isset($request['role'])) {
	//			$error['role'] ="Role must be selected";
	//		}else{
	//			$role = $request['role'];
	//		}
			if (!isset($request['specialization'])) {
				$error['specialisation'] ="Specialisation must be selected";
			}else{
				$specialisation = $request['specialization'];
			}


			$data["first_name"] =$first_name;
			$data['last_name']  =$last_name;
			$data['password']   =$password;
			$data['phone']		=$phone;
			$data['email']		=$email;
			//$data['role']		=$role;
			$data['specialisation'] =$specialisation;

			
			if (!empty($error)) {
				
			}
			else
			{
				//no errors
			 // Check if the given email already exists
            $email_exists =$this->User_Model->_exists('email',$email);
            $phone_exists =$this->User_Model->_exists('phone',$phone);
            //
				// insert data
            	if($email_exists)
            	{
            		$error['email_exists']	= 'Email already used';			
				}
				
				if ($phone_exists)
				{
					$error['phone_exists']	= 'Phone already used';
				}

				if (empty($error)) 
				{
					$insert =$this->User_Model->insert($data);
					 if ($insert) {
							$this->response->set_status(true);
						    $this->response->set_message('Registration Succesfully');
						    $data['success'] =true;
						    $this->response->set_data($data);
						    $this->response->set_available(true);
					 }
					 else
					 {
					 		$this->response->set_status(true);
						    $this->response->set_message('Registration Failed');
						    // $this->response->set_data($query->result('B_User'));
						    // $this->response->set_available(true);
					 }
				}
				else
				{
					$this->response->set_status(true);
				}
			}

			if(!empty($error))  $this->response->set_error($error);
		}
		$data_view['response'] =$this->response;
		//load view to echo the view
		$this->load->view('response',$data_view);
	}
	public function contact($app_auth_key =false,$id = false){
		$id=$id;
		if (isset($_POST['id'])) $id = $_POST['id'];
		$response =$this->response;
		$c =$this->User_Model->get_contact($id);
		$query =$this->User_Model->get_query();
		$contact =$query->result('B_Contact');
		$num_rows = $query->num_rows();
		if ($num_rows == 1) {
			$this->response->set_status(true);
		    $this->response->set_message('User Contact as Follows');
		    $this->response->set_data($contact);
		    $this->response->set_available(true);
		}else{
			$this->response->set_status(true);
		    $this->response->set_message('No User Found');
		    // $this->response->set_data($controller_data->result('B_User'));
		}
		$data_view['response'] = $response;
		$this->load->view('response',$data_view);
	}
	//select based on id 
	public function get($app_auth_key =false,$id=false){
		$this->app_auth_key = $app_auth_key;
		$id =$id;
		if(isset($_POST['app_auth_key'])) $this->app_auth_key = $_POST['app_auth_key'];
		if(isset($_POST['id'])) $id = $_POST['id'];
		//
		$is_available = $this->User_Model->get_by_id($id);
		$controller_data = $this->User_Model->get_query();
		$this->response->set_status(true);
		$this->response->set_available($is_available);
		$this->response->set_data($controller_data->result('B_User'));
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);		
	}
	public function profile($app_auth_key = false,$id = false)
	{
		$this->response->set_status(true);
		$this->app_auth_key = $app_auth_key;
		$id =$id;
		if(isset($_POST['app_auth_key'])) $this->app_auth_key = $_POST['app_auth_key'];
		if(isset($_POST['id'])) $id = $_POST['id'];
		$user = array('owner_id' =>$id,'sell_status'=>'OK');

		$is_available = $this->User_Model->get_by_id($id);
		$controller_data = $this->User_Model->get_query();
		$animals = $this->Animal_Model->get_by_($user); 
		$controller_data_animal =$this->Animal_Model->get_query();

		//data
		$data['details'] = $controller_data->result('B_User');
		// $data['animals'] = $controller_data_animal->result('B_Animal');
		$data['animals']  =null;
		$data['sales'] = null ;
		$data['services'] = null;
		$data['products'] = null;

		$this->response->set_data($data);
		$this->response->set_available(true);
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
	public function specialisation()
	{
		$sp = $this->User_Model->get_specialiation();
		$this->response->set_status(true);
		$this->response->set_data($sp);
		$this->response->set_available(true);
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
	public function update($app_auth_key =false,$id=false)
	{
		$id =$id;
		$this->response->set_status(true);
		$this->app_auth_key = $app_auth_key;
		if(isset($_POST['app_auth_key'])) $this->app_auth_key = $_POST['app_auth_key'];
		if(isset($_POST['id'])) $id = $_POST['id'];
		$response  = array();
		$success =false;
		$error =array();
		if ($_SERVER["REQUEST_METHOD"]!= 'POST') {
		$success = false;
		$error['access']	 = 'Access Mode';
		$response['message']= 'Access Denied';
		}else{
			$request= $_REQUEST;
			if ($id!=false) 
			{
				$user_id =$id;
				$spec ='';
				$county_code ='';
				$sub_county  = '';
				$ward ='';
				if(!isset($request['county_code']) OR $request['county_code'] ==''){
					$error['county_code'] = 'County code Required';
				}else{
					$county_code =$request['county_code'];
				}
				if(!isset($request['spec']) OR $request['spec'] ==''){
					$error['spec'] = ' Specialisation Required';
				}else{
					$spec =$request['spec'];
				}
				if(!isset($request['sub_county']) OR $request['sub_county'] ==''){
					$error['sub_county'] = 'Sub County code Required';
				}else{
					$sub_county =$request['sub_county'];
				}
				if(!isset($request['ward']) OR $request['ward'] ==''){
					$error['ward'] = 'Ward code Required';
				}else{
					$ward =$request['ward'];
				}
				if(!isset($request['reg_no']))
				{
					if (!($spec == 'Farmer'))
					{
						$error['reg_no'] ='registration  number Required';
					}else{
					$reg_no ='';
					}
				}else{
					$reg_no =$request['reg_no'];
				}
				

//


				if(empty($error)) $success =true;
			if ($success) 
			{
				$data['ward_id'] =$county_code."_".$ward;
				$data['reg_no'] =$reg_no ?: 'null';
				$data['specialisation'] =$spec;
				$data['id'] =$id;
				//update
				if($this->User_Model->update($data))
				{
					$this->response->set_message('Update Succesfull');
				}
			}


			}
			else
			{
				$error['id'] = 'Update id should be provided';

			}

			$this->response->set_error($error);
			// $this->response->set_data($service);
			$this->response->set_status(true);
			if (!empty($this->response->data) OR $this->response->data != null)
			{
				$this->response->set_available(true);
			}
			$data_view['response'] = $this->response;
			$this->load->view('response',$data_view);

			}
		echo json_encode($this->response);
	}
}