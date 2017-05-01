<?php

require_once 'functions.php';

$date_obj=date_create("2017-04-30");
$date=date_format($date_obj,"Y/m/d");
$last_date=strtotime($date);
$current_date=strtotime(date("Y-m-d"));
if($last_date>$current_date)
	{
	if(isset($_GET['token']) && isset($_GET['user_id'])){
		$token = ($_GET['token']);
		$decrypt=openssl_decrypt("$token", "AES-256-CBC",'This is my secret key');
		$user_id = $_GET['user_id'];
		$user_details = getUserDetails($user_id);
		$user_token = $user_details["0"]["token"];
		$user_status = $user_details["0"]['status'];

		if($user_status != 'confirmed'){
			if($decrypt == $user_token){
				displayRSVPSuccess($user_id);
			} else {
				displayRSVPFailure();
			}
		} else {
			displayAlreadyConfirmed();
		}
	}
	else{
	echo "nothing to get";
	}
}	
else{
	echo ("The last date of registering your response is over.");
}