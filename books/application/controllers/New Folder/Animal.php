<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Animal extends CI_Controller {
	private $access_allowed;
	private $method ='';
	function __construct(){
		parent::__construct();
		$this->method =$_SERVER["REQUEST_METHOD"];
		$this->load->helper('url');
		$this->load->helper('email');
				// Load Database
		$this->load->database();

		$this->load->model('AnimalModel');
		
	}
	public function index()
	{

	}

	public function register(){
		$response = array();
		$error =array();
		$success =false;
		if ($this->method != 'POST') {
		$success = false;
		$error['access']	 = 'Access Mode';
		$response['message']= 'Access Denied';
		}else{
			$request = $_REQUEST;
			$name ='';
			$owner_id;
			$dam;
			$sire;
			$milk_capacity =0;
			$date_of_birth;
			$type;
			$pic;
			$reg_no;
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
			if(empty(sizeof($error))) $success =true;

			$data  = array();
			if ($success) {
				$data['name'] = $name;
				$data['owner_id'] = $owner_id;
				$data['dam'] =$dam;
				$data['sire'] =$sire;
				$data['milk_capacity'] =$milk_capacity;
				$data['date_of_birth'] =$date_of_birth;
				$data['breed'] =1;
				$data['reg_no'] = $reg_no;
				

				$image = str_replace('data:image/png;base64,', '', $pic);
				$image = str_replace(' ', '+', $image);
				// Decode the Base64 encoded Image
				$bin = base64_decode($image);
				$file_name = md5(uniqid(rand(), true));
				// Create Image path with Image name and Extension
				$file = './uploads/' .$file_name. '.jpg';
				// Save Image in the Image Directory
				$success = file_put_contents($file, $bin);
				$data['pic'] =$file;
				$insert = $this->AnimalModel->insert($data);
            	if ($insert) {
            		$response['message'] ="Registered Succesfully";
            		$response['success'] =true;
            	}else{
            		$response['message'] ="could not registered Succesfully";
            		$response['success'] =false;
            	}	
			}
		$response['success'] = $success;
		$response['error'] = $error;
		}
		echo json_encode($response);
	}

	public function get(){
		$response =array();
		if ($this->method != 'POST') {
		$response['success'] =false;
		$error['access']	 = 'Access Mode';
		$response['message']= 'Access Denied';
		}else{
		$animals =$this->AnimalModel->getAnimals();
		$response['success'] =true;
		$response['animals'] =$animals;
		}
		//load view for this
		echo json_encode($response);
	}
	public function getbull(){
		$response =array();
		if ($this->method != 'POST') {
		$response['success'] =false;
		$error['access']	 = 'Access Mode';
		$response['message']= 'Access Denied';
		}else{
		$bulls =$this->AnimalModel->getBulls();
		$response['success'] =true;
		$response['bulls'] =$bulls;
		}
		//load view for this
		echo json_encode($response);
	}
	public function getmate($id =false){
		$anim_id =$id;
		$response = array();
		$error =array();
		$success =false;

		
		$response =array();
		if ($this->method != 'POST') {
		$response['success'] =false;
		$error['access']	 = 'Access Mode';
		$response['message']= 'Access Denied';
		}else{
			$anim =$this->AnimalModel ->get($anim_id);
			
			// $dam_id =$anim['dam'];
			$sire_id = $anim['sire'];	
				// $mothers_lineage =$this->AnimalModel->getMates($dam_id);
			$mates =$this->AnimalModel->getMates($sire_id);

			// 	// // lineage
		
			// 	$fathers =array_unique(array_merge($mothers_lineage,$fathers_lineage));
			// 	// //select all  males 
			// 	$males =$this->AnimalModel->getMales();
			// 	$ids =array();
			// 	foreach ($males as $key => $value) {
			// 		$male_id  = $value->id;
			// 		array_push($ids, $male_id);
			// 	}
				
			// 	$mates = array_diff($ids,$fathers);
				$response['success'] =true;
				$response['mates'] =$mates;
			
		}
		echo(json_encode($response));
	}
	public function getF($id =false){
		$dam =$dam_id;
		echo json_encode($mates =$this->AnimalModel->getFathers($dam));
	}
	public function category($category_id =false){
		$response =array();
		if ($this->method != 'POST') {
		$response['success'] =false;
		$error['access']	 = 'Access Mode';
		$response['message']= 'Access Denied';
		}else{
			if ($category_id) {
				if($category_id === 0){//uncatched error,zero is false,
				//$categories =$this->AnimalModel->getCategories($category_id);
				$response['success'] =false;
				$response['message'] ='The input not allowed';
				}else{
				$categories =$this->AnimalModel->getCategories($category_id);
				$response['success'] =true;
				$response['categories'] =$categories;	
				}
				
			}else{
				$categories =$this->AnimalModel->getCategories();
				$response['success'] =true;
				$response['categories'] =$categories;
			}
			echo $category_id;
		}
		//load view for this
		echo json_encode($response);
	}
	public function bullregister(){
		$response = array();
		$error =array();
		$success =false;
		if ($this->method != 'POST') {
		$success = false;
		$error['access']	 = 'Access Mode';
		$response['message']= 'Access Denied';
		}else{
			$request = $_REQUEST;
			$name ='';
			$owner_id;
			$dam;
			$sire;
			$milk_capacity =0;
			$date_of_birth;
			$type;
			$pic;
			$reg_no;
			if (isset($request['name']) && $request['name'] != '') {
				$name =$request['name'];
			}else{
				$error['name'] = 'Name required';
			}
			if (isset($request['user_id']) && $request['user_id'] != '') {
				$owner_id =$request['user_id'];
			}else{
				$error['owner_id'] = 'Owner  required';
			}
			if (isset($request['dam']) && $request['dam'] != '') {
				$dam =$request['dam'];
			}else{
				$error['dam'] = 'Dam  required';
			}
			if (isset($request['sire']) && $request['sire'] != '') {
				$sire =$request['sire'];
			}else{
				$error['sire'] = 'Sire  required';
			}
			if (isset($request['milk_volume']) && $request['milk_volume'] != '') {
				$milk_volume =$request['milk_volume'];
			}else{
				$error['milk_volume'] = 'milk capacity  required';
			}
			if (isset($request['longevity']) && $request['longevity'] != '') {
				$longevity =$request['longevity'];
			}else{
				$error['longevity'] = 'longevity  required';
			}
			if (isset($request['breed_type']) && $request['breed_type'] != '') {
				$breed_type =$request['breed_type'];
			}else{
				$error['breed_type'] = 'type  required';
			}
			if (isset($request['ai_code']) && $request['ai_code'] != '') {
				$ai_code =$request['ai_code'];
			}else{
				$error['ai_code'] = 'Bull registration number  required';
			}
			if (isset($request['fertility']) && $request['fertility'] != '') {
				$ai_code =$request['fertility'];
			}else{
				$error['fertility'] = 'Bull fertility  required';
			}
			if (isset($request['pic']) && $request['pic'] != '') {
				$pic =$request['pic'];
			}else{
				$error['pic'] = 'Picture/Image  required';
			}
			if(empty(sizeof($error))) $success =true;
			$data  = array();
			if ($success) {
				$data['name'] = $name;
				$data['owner_id'] = $owner_id;
				$data['dam'] =$dam;
				$data['sire'] =$sire;
				$data['milk_volume'] =$milk_volume;
				$data['longevity'] =$longevity;
				$data['breed_type'] =$breed_type;
				$data['ai_code'] = $ai_code;
				$data['table'] ='bull';

				$image = str_replace('data:image/png;base64,', '', $pic);
				$image = str_replace(' ', '+', $image);
				// Decode the Base64 encoded Image
				$bin = base64_decode($image);
				$file_name = md5(uniqid(rand(), true));
				// Create Image path with Image name and Extension
				$file = $file_name. '.jpg';
				// Save Image in the Image Directory
				$data['pic'] =$file;
				$insert = $this->AnimalModel->insert($data);
            	if ($insert) {
            		$move = file_put_contents($file, $bin);
            		$response['message'] ="Registered Succesfully";
            		$success =true;
            	}else{
            		$response['message'] ="could not registered Succesfully";
            		$response['success'] =false;
            	}
			}
			$response['success'] = $success;
			$response['error'] = $error;
		}
		echo json_encode($response);
	}
	public function recursion($id=false){
		$response =array();
		$response['bulls'] =array();
		$id =$id;
		if($id == false){
			$response['success'] =false;
			$response['bulls'] =array();
			$response['message'] ='No animal id supplied for the query';
		}else{
		$siblings =$this->AnimalModel->getSiblings($id);
		$bull_siblings =$this->AnimalModel->getBullSiblings($id);
		$bfathers_lineage =$this->AnimalModel->getbFathers($id);
		$fathers_lineage =$this->AnimalModel->getFathers($id);
		$mothers_lineage = $this->AnimalModel->getMFathers($id);
		$relatives =array_merge($mothers_lineage,$fathers_lineage);
		$relatives =array_merge($relatives,$siblings);
		$relatives =array_unique($relatives);
		$animals =$this->AnimalModel->getAnimals();

		// bulls
		$all_relative_bulls =array_merge($bull_siblings,$bfathers_lineage);
		$all_relative_bulls  =array_unique($all_relative_bulls);
		$bulls =$this->AnimalModel->getBulls();
		$animals_id =array();
		$bulls_id =array();
		foreach ($bulls as $bull => $value) {
				array_push($bulls_id, $value->ai_code);
			}
			foreach ($animals as $animal => $value) {
				array_push($animals_id, $value->id);
			}
		$non_relative_bulls =array_diff($bulls_id,$all_relative_bulls);
		$non_relatives = array_diff($animals_id,$relatives);
	
		$bulls_list=array();
		$bulls_listFromAnimals =array();
		$t_id =array();
		foreach ($non_relative_bulls as $key => $value) {
			$bull=$this->AnimalModel->getFrom('bull',$value);
			array_push($bulls_list, (object)$bull);
		}
		foreach ($non_relatives as $key => $value) {
			$bull=$this->AnimalModel->getFrom('animal',$value);
			array_push($bulls_listFromAnimals, $bull);
		}
		// $response['mates']['from']['animals'] =$bulls_listFromAnimals;
		$response['bulls'] =$bulls_list;
		}	

		echo json_encode($response);
	}
	public function insurable($id = false){
		date_default_timezone_set('Africa/Nairobi');
		$response = array();
		if($id){
			$animal=$this->AnimalModel->get($id);
			if($animal != null){
				$dateOfBirth = $animal['date_of_birth'];
				$today = date("Y-m-d");
				$diff = date_diff(date_create($dateOfBirth), date_create($today));
				$age =$diff->format('%m');
				$animal_type ='beef';

				if ($animal_type == 'beef' OR $animal_type == 'Dairy' && $age>=3 && $age>=120) {
					$response['success'] = true;
					$response['insurable'] =true;
					$response['Message'] =  'Beef and Dairy age between 3 months are eligible for Insurance';
					
				}else{
					$response['success'] = true;
					$response['insurable'] =false;
					$response['Message'] =  'unknown animal category';
				}
			}else{
			$response['success']	 =	true;
			$response['insurable']	 =	false;
			$response['message'] 	 =	'We insure only register animals';
			}

		}else{
			$response['success']	 =	true;
			$response['insurable']	 =	false;
			$response['message'] 	 =	'We insure only register animals';
		}
		echo json_encode($response);
	}
	public function market(){
		$response =array();
		$animals_in_market =$this->AnimalModel->getAnimalsInMarket();
		echo json_encode($animals_in_market);
	}
	public function sell($owner_id=false,$animal_id=false){
		$response =array();
		if ($owner_id ==true && $animal_id == true) {
			$data['sell_status'] =1;
			$where =array('owner_id'=>$owner_id,'id'=>$animal_id);
			$update =$this->AnimalModel->sell($data,$where);
			$response['success'] =true;
			$response['message'] = "Succesfully Sent to market Place";
			$response['sell_status'] = $update;
		}else{
			$response['success'] =true;
			$response['message'] = 'supply both animal and owner in your request';
			$response['sell_status'] = false;
		}
		echo json_encode($response);
	}
	public function buy($buyer_id=false,$animal_id=false,$owner_id=false)
	{
		$response =array();
		if ($owner_id ==true && $animal_id == true && $buyer_id==true)
		 {
		 	
			$this->AnimalModel->transfer($owner_id,$buyer_id,$animal_id);

			$response['success'] =true;
			$response['message'] = "Succesfully Sent to market Place";
			$response['sell_status'] = 3;
		}else{
			$response['success'] =true;
			$response['message'] = "Supply buyer id,animal id and owner id in request";
			$response['sell_status'] = 1;
		}
		echo json_encode($response);
	}
}
?>