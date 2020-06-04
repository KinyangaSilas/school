<?php
header("Content-Type:application/json");

defined('BASEPATH') OR exit('No direct script access allowed');
class Validation extends CI_Controller {
public function index()
{

if (!isset($_GET["token"]))
{
echo "Technical error";
exit();
}
if ($_GET["token"]!='yourPU_RstrongPasswordSample$')
{
echo "Invalid authorization";
exit();
}
if (!$request=file_get_contents('php://input'))
{
echo "Invalid input";
exit();
}
// $con = mysqli_connect($servername, $username, $password, $dbname);
// if (!$con) 
// {
// die("Connection failed: " . mysqli_connect_error());
// }
// //Put the json string that we received from Safaricom to an array
// $array = json_decode($request, true);
$file = 'transid.json';
// Open the file to get existing content
// Write the contents back to the file

// $transactiontype= mysqli_real_escape_string($con,$array['TransactionType']); 
// $transid=mysqli_real_escape_string($con,$array['TransID']); 
// $transtime= mysqli_real_escape_string($con,$array['TransTime']); 
// $transamount= mysqli_real_escape_string($con,$array['TransAmount']); 
// $businessshortcode=  mysqli_real_escape_string($con,$array['BusinessShortCode']); 
// $billrefno=  mysqli_real_escape_string($con,$array['BillRefNumber']); 
// $invoiceno=  mysqli_real_escape_string($con,$array['InvoiceNumber']); 
// $msisdn=  mysqli_real_escape_string($con,$array['MSISDN']); 
// $orgaccountbalance=   mysqli_real_escape_string($con,$array['OrgAccountBalance']); 
// $firstname=mysqli_real_escape_string($con,$array['FirstName']); 
// $middlename=mysqli_real_escape_string($con,$array['MiddleName']); 
// $lastname=mysqli_real_escape_string($con,$array['LastName']); 
 
// $sql="INSERT INTO mpesa_payments
// ( 
// TransactionType,
// TransID,
// TransTime,
// TransAmount,
// BusinessShortCode,
// BillRefNumber,
// InvoiceNumber,
// MSISDN,
// FirstName,
// MiddleName,
// LastName,
// OrgAccountBalance
// )  
// VALUES  
// ( 
// '$transactiontype', 
// '$transid', 
// '$transtime', 
// '$transamount', 
// '$businessshortcode', 
// '$billrefno', 
// '$invoiceno', 
// '$msisdn',
// '$firstname', 
// '$middlename', 
// '$lastname', 
// '$orgaccountbalance' 
// )";
 
// if (!mysqli_query($con,$sql)) 
 
// { 
// echo mysqli_error($con); 
// } 
 
 
// else 
// 
if(file_put_contents($file, $request);){ 
echo '{"ResultCode":0,"ResultDesc":"Confirmation received successfully"}';
}else{
	echo '{"ResultCode":1, "ResultDesc":"Failed", "ThirdPartyTransID": 0}'; 
}
 
// mysqli_close($con); 
}
}
?>