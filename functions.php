<?php 

$db = mysqli_connect('localhost','root','','guests') or die("error connecting to mysqli server"); 

function fetchTableData(){
	global $db;
	$query= 'SELECT * FROM data ORDER BY id DESC LIMIT 10';
	$store=mysqli_query($db, $query) or die('Error SQL!'.$query.'<br>'.mysqli_error());
	$guests = array();
	while ($row = mysqli_fetch_assoc($store)){
		array_push($guests, $row);
	}
	return $guests;
}

function addSubscriber($name, $phone, $email){
	global $db;
	$token = generateToken();
	
	$sql = "INSERT INTO data (name,phone,email,token) VALUES ('". $name ."','". $phone ."','". $email ."' ,'". $token ."')";
	if (mysqli_query($db, $sql)) {
		$mail = sendMail(mysqli_insert_id($db), $token,$name,$email);
		return 'success';
	} else {
		if(mysqli_errno($db) == 1062){
			return 'duplicate_entry';
		}
	}
	return 'failure';
}



function sendMail($user_id, $token,$name,$email){
	require_once __DIR__ . '/vendor/mandrill/mandrill/src/Mandrill.php';
	try {

	    $mandrill = new Mandrill('v0tqtpCwhDCIOLFe5Hw-gA');
	    $encrypt=openssl_encrypt("$token", "AES-256-CBC", 'This is my secret key');
	    $confirm_link = '<a href="http://rsvpt.dev/rsvp_confirm.php?token=' . "$encrypt" . '&user_id=' . $user_id . '">Confirm your email</a>';

	    $message = array(
	        'html' => "<p>You are invited to the event.</br>click this link to confirm RSVP</br>" . $confirm_link . "</p>",
	        // 'text' => 'Sending test mail',
	        'subject' => 'Confirm your email',
	        'from_email' => 'shubham@coloredcow.com',
	        'from_name' => 'Shubham',
	        'to' => array(
	            array(
	                'email' => "$email",
	                'name' => "$name",
	                'type' => 'to'
	            )
	        ),
	    );
	   $result = $mandrill->messages->send($message);
	    return true;
	} 
	catch(Mandrill_Error $e) {
	    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
	    return false;
	}
}

function generateToken(){
	return uniqid();
}

function getUserDetails($user_id){
	global $db;
	$user_data=array();
	$query= "SELECT * FROM data WHERE id='".$user_id."'";
	$select=mysqli_query($db, $query) or die('Error SQL!'.$query.'<br>'.mysqli_error());
	$row = mysqli_fetch_assoc($select);
	array_push($user_data, $row);
	return $user_data;
	// return true/false
}

function displayRSVPSuccess($user_id) {
	global $db;
	$query= "UPDATE `data` SET `status`='".'confirmed'."' WHERE `id`	='".$user_id."'";
	$update=mysqli_query($db,$query) or die('Error SQL!'.$query.'<br>'.mysqli_error());
	//var_dump($update);
	echo 'your email has been confirmed';
}

function displayRSVPFailure() {
	echo 'there has been some error. Please try again or contact our support team.';
}

function displayAlreadyConfirmed() {
	echo 'Good News! you have already confirmed your email';
}

