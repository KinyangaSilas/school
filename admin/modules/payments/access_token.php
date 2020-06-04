<?php
 # access token
  $consumerKey = 'KfJAjUlxafA5OGRiY7LGC3dOWhjM2nYo'; //Fill with your app Consumer Key
  $consumerSecret = 'BP4eVOfIhA5G2rgD'; // Fill with your app Secret
   # header for access token
  $headers = ['Content-Type:application/json; charset=utf8'];

   $curl = curl_init($access_token_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($curl, CURLOPT_HEADER, FALSE);
  curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
  $result = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $result = json_decode($result);
  $access_token = $result->access_token;  
  curl_close($curl);
 ?>