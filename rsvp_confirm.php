<?php

require_once 'functions.php';


if(isset($_GET['token']) && isset($_GET['user_id'])){
	$token = ($_GET['token']);
	// var_dump($token);
	// die();
	$user_id = $_GET['user_id'];
	$user_details = getUserDetails($user_id);
	$user_token = $user_details["0"]["token"];
	$user_status = $user_details["0"]['status'];

	if($user_status != 'confirmed'){
		if($token == $user_token){
			displayRSVPSuccess($user_id);
		} else {
			displayRSVPFailure();
		}
	} else {
		displayAlreadyConfirmed();
	}
}
else
echo "nothing to get";