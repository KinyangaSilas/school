<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class County_Model  extends CI_Model
{
	private $allowed =array(
		array('id' =>'012','name' =>'Meru'),
		array('id' =>'001','name' =>'Mombasa')
	);
	var $folder ='application/models/ke/';
	function __construct()
	{
		parent::__construct();
	}
	public function is_allowed($county_id =false)
	{
		$id =$county_id;
		if(array_search($id, array_column($this->allowed, 'id'))) return true;
		return false;
	}
	private function set_allowed($allowed=array()){$this->allowed =$allowed;}
	private function get_allowed(){return $this->allowed;}
	public function get_wards($id,$subcounty)
	{
		    $data =null;
			$county_file = $this->folder.''.$id.'.json';
			if (file_exists($county_file))
			{
				$data = json_decode(file_get_contents($county_file));
			}
			else
			{
				$data = array();
			}
		    $wards =array();
		    $str = str_replace('%20', ' ', $subcounty);
		       foreach ($data as $key => $value)
		       {
			        if($value->constituency ==$str)
			        {
				        $ward =array();
				        $ward['id'] =$value->_id;
				        $ward['name'] =$value->name;
				        array_push($wards,$ward);
			        }

		       }
		return $wards;
	}
	public function get_subcounties($id)
	{
			$data =null;
			$county_file = $this->folder.''.$id.'.json';
			if (file_exists($county_file))
			{
				$data = json_decode(file_get_contents($county_file));
			}
			else
			{
				$data = array();
			}
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
	public function get(){
      //return all counties and their county code
      $folder =$this->folder.'counties.json';
      $data = json_decode(file_get_contents($folder));
      return $data;
    }
}
?>
