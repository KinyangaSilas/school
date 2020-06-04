<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Animal extends CI_Controller {

	private $method ='';

	function __construct()
	{
		parent::__construct();
		$this->method =$_SERVER["REQUEST_METHOD"];
		$this->load->model('Animal_Model');
		$this->load->model('Payment_Model');

		$this->load->model('B_Animal');
		$this->load->model('response');
	}
	public function index()
	{

	}
	public function register($app_auth_key =false)
	{
		$this->app_auth_key = $app_auth_key;
		$error =array();
		// $id =$id;
		if(isset($_POST['app_auth_key'])) $this->app_auth_key = $_POST['app_auth_key'];
		// if(isset($_POST['id'])) $id = $_POST['id'];
		if ($this->method != 'POST') {
		$this->response->set_status(true);
		$this->set_message('Bad Request');

		}else{
			$this->response->set_status(true);
			$request = $_REQUEST;
			$name ='';
			$owner_id;
			$dam;
			$sire;
			$milk_capacity =0;
			$date_of_birth;
			$type;
			$pic;
			$category =1;
			$reg_no;
			$extension = 'jpg';
			if (isset($request['name']) && $request['name'] != '') {
				$name =$request['name'];

			}else{
				$error['name'] = 'Name required';
			}
			if (isset($request['owner_id']) && $request['owner_id'] != '') {
				$owner_id =$request['owner_id'];
			}else{
				$error['owner_id'] = 'Owner  required';
			}
			if (isset($request['dam']) && $request['dam'] != '') {
				$dam =$request['owner_id'];
			}else{
				$error['dam'] = 'Dam  required';
			}
			if (isset($request['sire']) && $request['sire'] != '') {
				$sire =$request['sire'];
			}else{
				$error['sire'] = 'Sire  required';
			}
			if (isset($request['milk_capacity']) && $request['milk_capacity'] != '') {
				$milk_capacity =$request['milk_capacity'];
			}else{
				$error['milk_capacity'] = 'milk capacity  required';
			}
			if (isset($request['date_of_birth']) && $request['date_of_birth'] != '') {
				$date_of_birth =$request['date_of_birth'];
			}else{
				$error['date_of_birth'] = 'date_of_birth  required';
			}
			if (isset($request['type']) && $request['type'] != '') {
				$type =$request['type'];
			}else{
				$error['type'] = 'type  required';
			}
			if (isset($request['reg_no']) && $request['reg_no'] != '') {
				$reg_no =$request['reg_no'];
			}else{
				$error['reg_no'] = 'Animal registration number  required';
			}
			if (isset($request['pic']) && $request['pic'] != '') {
				$pic =$request['pic'];
			}else{
				$error['pic'] = 'Image  required';
			}
			if (isset($request['category']) && $request['category'] != '') {
				$type =$request['category'];
			}else{
				$error['category'] = 'category  required';
			}

			// if(empty(sizeof($error))) $success =true;

			// $data  = array();
			if (empty($error)) {
				$data['name'] = $name;
				$data['owner_id'] = $owner_id;
				$data['dam'] =$dam;
				$data['sire'] =$sire;
				$data['milk_capacity'] =$milk_capacity;
				$data['date_of_birth'] =$date_of_birth;
				$data['breed'] =1;
				$data['category'] = $category;
				$data['reg_no'] = $reg_no;
				$image = str_replace('data:image/png;base64,', '', $pic);
				$image = str_replace(' ', '+', $image);
				// Decode the Base64 encoded Image
				$bin = base64_decode($image);
				$file_name = md5(uniqid(rand(), true));
				// Create Image path with Image name and Extension
				$file = './uploads/' .$file_name. '.'.$extension;
				// Save Image in the Image Directory
				$success = file_put_contents($file, $bin);
				$data['pic'] =$file_name.'.'.$extension;

				if ($success) {
					$insert_id =$this->Animal_Model->insert($data);
					if ($insert_id)
					{
						$data['success'] =true;
						$this->response->set_message('Registered Succesfully');
						$this->response->set_status(true);
						$this->response->set_data($data);
						$this->response->set_available(true);
					}
					else
					{
						$error['success'] =false;
					}
				}
				else{
					$error['upload_error'] ='Could not Upload the image';
				}
			}
		$this->response->set_error($error);
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
		}
	}
	public function get($app_auth_key =false,$animal_id =false)
	{
		
		$this->app_auth_key = $app_auth_key;
		$error =array();
		$id =$animal_id;
		if(isset($_POST['app_auth_key'])) $this->app_auth_key = $_POST['app_auth_key'];
		if(isset($_POST['animal_id'])) $id = $_POST['animal_id'];
		if ($this->method != 'POST') {
			$error['request'] =$this->method;

			//
			$this->response->set_status(true);
			$this->response->set_available(false);
			$this->response->set_message('Bad request');
		}
		else
		{
			$animals =$this->Animal_Model->get_animals();
			if($animal_id)
			{
				$animals = $this->Animal_Model->get_by_id($animal_id);
			}
			$this->response->set_status(true);
			$query=$this->Animal_Model->get_query();
			if ($animals>=1) 
			{
				$this->response->set_message($animals ." animal(s) fetched");
				$this->response->set_data($query->result('B_Animal'));
				$this->response->set_available(true);
			}
			else
			{
				$this->response->set_message('No Animal Found');
			}
		}
		if(!empty($error))  $this->response->set_error($error);
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
	public function sell($app_auth_key =false,$owner_id =false,$animal_id =false)
	{
		$this->app_auth_key = $app_auth_key;
		$error =array();
		$animal_id =$animal_id;
		$seller_id =$owner_id;
		$amt  = 0;
		$this->response->set_status(true);

		if(isset($_POST['app_auth_key'])) $this->app_auth_key = $_POST['app_auth_key'];
		if(isset($_POST['animal_id'])) $animal_id = $_POST['animal_id'];
		if(isset($_POST['seller_id'])) $seller_id = $_POST['seller_id'];
		if(isset($_POST['amount'])) $amt = $_POST['amount'];
		if ($this->method != 'POST') {
			$error['request'] =$this->method;

			//
			$this->response->set_status(true);
			$this->response->set_available(false);
			$this->response->set_message('Bad request');
		}
		else
		{
			$subscribed= true;

			$pay['tran_id'] = '1';
			if(isset($_POST['tran_id'])) $pay['tran_id'] =$_POST['tran_id'];			
				$sell_data['fee_id'] =2;
				$sell_data['seller_id'] =$seller_id;
				$sell_data['animal_id'] = $animal_id;
				$sell_data['amount']   = $amt;
				if ($seller_id == '' OR $seller_id == null)
				{
					$error['seller'] = 'Seller should be provided';
				}
				$animal_exists = $this->Animal_Model->_exists($animal_id);
				$animal_in_market =false;
				$animal = $this->Animal_Model->get_by_id($animal_id);
				 // if ($animal)
				 // {
				 // 	// $query  = $this->Animal_Model->get_query();
				 // 	// $q = $query->result('B_Animal');
				 // 	// if ($q['sell_status'] == 'ENTERED')
				 // 	// {
				 // 	// 	$error['in_market'] = true;			 		

				 // 	// }
				 // }

				if(!$animal_exists)
				{
					$error['animal_exists'] =$animal_exists;
				}
				//check whether they own the animal to send to the market
		// 		$query = $this->Animal_Model->get_query();
		// 		$query_result = $query->result_array();
		// 		if(!($query_result[0]['owner_id'] == $seller_id))
		// 		{
		// 			$error['seller'] ='You can only sell your Animals';
		// 		}
		// 		// $fee_not_user = true;//$this->Payment_Model->status($tran_id);

		// 		// if (!$fee_not_user) 
		// 		// {
		// 		// 	$error['payment'] ='Already Used';
		// 		// }

		// 		//animal

		// 		//check whether same seller aint selling twice
		// 		$not_twice =true;

		if(empty($error))
			{
				//update the animal to animal sale status to 'enter'
				$sell_data['sell_status'] = 'ENTERED';
				$sale = $this->Animal_Model->sale_enter($sell_data);
				//check not sell status entered before
			if ($sale) 
				{
					$data['sell_status'] = 'ENTERED';
					$where =array('owner_id'=>$seller_id,'id'=>$animal_id);
				if($this->Animal_Model->_update($data,$where))
					{
						$this->response->set_message('Succesfully Sent to the market');
						$this->response->set_data(array('success' =>true));
				}
			}

		}
		}
		if(!empty($error))  $this->response->set_error($error);
		if (!empty($this->response->data) OR $this->response->data != null)
		{
			$this->response->set_available(true);
		}
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
	public function filter($app_auth_key =false,$category= false)
	{
		$this->app_auth_key = $app_auth_key;
		$category =$category;
		$owner_id =0;
		$data = null;
		// if(isset($_POST['app_auth_key'])) $this->app_auth_key = $_POST['app_auth_key'];
		if(isset($_POST['category'])) $category= $_POST['category'];
		if(isset($_POST['owner_id'])) $owner_id= $_POST['owner_id'];
		if ($category == '' || $category  == null || $category == false || $category == 0)
		{
			$data['category'] = 0;
		}
		else
		{
			$data['category']  = $category;
		}

		
		$data['owner_id'] = $owner_id;
		$data['sell_status'] = 'OK';
		if ($data['category'] === 0 || $data['owner_id'] === 0)
		{
			$this->response->set_data(null);
			$this->response->set_message('Provide own id and Category');
		}
		else if($data['owner_id'] === 0 || $data['owner_id'] ==='')
		{
		$data_b['owner_id'] =$data['owner_id'];
		$controller_data = $this->Animal_Model->get_by_id($data_b['owner_id']);
		$query=$this->Animal_Model->get_query();
		$this->response->set_data($query->result());
		}
		else 
		{
		$controller_data = $this->Animal_Model->get_by_($data);
		$query=$this->Animal_Model->get_query();
		$this->response->set_data($query->result());
		}


		$this->response->set_status(true);
		if (!empty($this->response->data) OR $this->response->data != null)
		{
			$this->response->set_available(true);
		}
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
	public function market($api_auth_key = false)
	{
		$this->response->set_status(true);
		//select all sale ,in entered status,
		$controller_data = $this->Animal_Model->get_market();
		$query=$this->Animal_Model->get_query();
		$this->response->set_data($query->result());

		if (!empty($this->response->data) OR $this->response->data != null)
		{
			$this->response->set_available(true);
		}
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
	public function breed($app_auth_key =false)
	{
		$animal_id =0;
		$this->response->set_status(true);
		$this->app_auth_key = $app_auth_key;
		if(isset($_POST['app_auth_key'])) $this->app_auth_key = $_POST['app_auth_key'];
		if(isset($_POST['animal_id'])) $animal_id= $_POST['animal_id'];
		if ($animal_id == 0 || $animal_id == null || $animal_id == '') {
			$error['animal_details'] ="Provide Animal details";
		}
		//check gender
		$animal = $this->Animal_Model->get_by_id($animal_id);

		if ($animal) {
			$query = $this->Animal_Model->get_query();
			$animal1 = $query->result("B_Animal");
			$data =array('ai_code !='=>$animal1['0']->sire); 
			if ($animal1[0]->gender == 'Male' || $animal1[0]->gender == 1 )
			{
				$error['Male'] = '"Male not Bred';
			}
			if (empty($error))
			{
				$bull = $this->Animal_Model->get_bull($data);
				$query = $this->Animal_Model->get_query();
				$bulls = $query->result("B_Animal");
				$this->response->set_data($bulls);
			}

		}
		if (!empty($error))
		{
			$this->response->set_error($error);
		}
		if (!empty($this->response->data) OR $this->response->data != null)
		{
			$this->response->set_available(true);
		}
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
	public function statistics($id =false){
		$owner_id =0;
		if(isset($_POST['owner_id'])) $owner_id= $_POST['owner_id'];
		if($owner_id === 0){
			$this->response->set_data(null);
		}
		else
		{
		$animals = $this->Animal_Model->statistics($owner_id);
		$this->response->set_data($animals);
	    }
		$data_view['response'] = $this->response;
		$this->load->view('response',$data_view);
	}
}