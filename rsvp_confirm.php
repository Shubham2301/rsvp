<?php

require_once 'functions.php';

$date_obj=date_create("2017-04-30");
$date=date_format($date_obj,"Y/m/d");
$last_date=strtotime($date);
$current_date=strtotime(date("Y-m-d"));

	if(isset($_GET['token']) && isset($_GET['user_id'])) {
		$token = rawurldecode($_GET['token']);
		$user_id = rawurldecode($_GET['user_id']);
		$decrypt_token = openssl_decrypt("$token", "AES-256-CBC",'sndja78y1241djht152e1');
		$decrypt_uid=openssl_decrypt("$user_id", "AES-256-CBC", 'sndja78y1241djht152e1');
		$user_details = getUserDetails($decrypt_uid);
		$user_token = $user_details["0"]["token"];
		$user_status = $user_details["0"]['status'];
		if($last_date>$current_date)
		{
			if($user_status != 'confirmed')
			{
				if($decrypt_token == $user_token)
					{
						changeStatus($decrypt_uid,'confirmed');
					} else 
					{
						displayRSVPFailure();
					}
			} 
			else 
			{
				displayAlreadyConfirmed();
			}
		}		
		else
		{			
			changeStatus($decrypt_uid,'declined');
			echo "Response registration date is over";
		}

	}		
	else {
		echo "nothing to get";
	}

?>
