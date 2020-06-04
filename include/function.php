<?php
	function login(){
		if(isset($_POST['btnLogin'])){
			  $email = trim($_POST['user_email']);
			  $upass  = trim($_POST['user_pass']);
			  $h_upass = sha1($upass);
			  
			   if ($email == '' OR $upass == '') {

			      message("Invalid Username and Password!", "error");
			      redirect (web_root."login.php");
			         
			    } else {  
			      //it creates a new objects of member
			        $student = new Student();
			        //make use of the static function, and we passed to parameters
			        $res = $student::studentAuthentication($email, $h_upass);
			        if ($res==true) {  
			             redirect(web_root."index.php"); 
			        }else{
			          message("Account does not exist! Please contact Administrator.", "error");
			          redirect (web_root."login.php");
			        }
			   }
			 } 
 
	}
	function strip_zeros_from_date($marked_string="") {
		//first remove the marked zeros
		$no_zeros = str_replace('*0','',$marked_string);
		$cleaned_string = str_replace('*0','',$no_zeros);
		return $cleaned_string;
	}
	function redirect_to($location = NULL) {
		if($location != NULL){
			header("Location: {$location}");
			exit;
		}
	}
	function redirect($location=Null){
		if($location!=Null){
			header("Location: {$location}");
		}else{
			echo 'error location';
		}
		 
	}
	function output_message($message="") {
	
		if(!empty($message)){
		return "<p class=\"message\">{$message}</p>";
		}else{
			return "";
		}
	}
	function date_toText($datetime=""){
		$nicetime = strtotime($datetime);
		return strftime("%B %d, %Y at %I:%M %p", $nicetime);	
					
	}
	function __autoload($class_name) {
		$class_name = strtolower($class_name);
		$path = LIB_PATH.DS."{$class_name}.php";
		if(file_exists($path)){
			require_once($path);
		}else{
			die("The file {$class_name}.php could not be found.");
		}
					
	}

	function currentpage_public(){
		$this_page = $_SERVER['SCRIPT_NAME']; // will return /path/to/file.php
	    $bits = explode('/',$this_page);
	    $this_page = $bits[count($bits)-1]; // will return file.php, with parameters if case, like file.php?id=2
	    $this_script = $bits[0]; // will return file.php, no parameters*/
		 return $bits[2];
	  
	}

	function currentpage_admin(){
		$this_page = $_SERVER['SCRIPT_NAME']; // will return /path/to/file.php
	    $bits = explode('/',$this_page);
	    $this_page = $bits[count($bits)-1]; // will return file.php, with parameters if case, like file.php?id=2
	    $this_script = $bits[0]; // will return file.php, no parameters*/
		 return $bits[4];
	  
	}
  // echo "string " .currentpage_admin()."<br/>";

	function curPageName() {
 return substr($_SERVER['REQUEST_URI'], 21, strrpos($_SERVER['REQUEST_URI'], '/')-24);
}

  // echo "The current page name is ".curPageName();
	 
		function dateFormat($date="",$format=""){
		return date_format(date_create($date),$format);
	}
		
?>