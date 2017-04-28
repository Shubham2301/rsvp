<?php 

$db = mysqli_connect('localhost','root','','guests') or die("error connecting to mysqli server"); 

if(isset($_POST['action'])){
	switch ($_POST['action']) {
		case 'getUpdatedList':
			getUpdatedList();
			break;
		case 'addSubscriber':
			addSubscriber();
			break;
	}
}

function getUpdatedList(){
	print json_encode(fetchTableData());
}

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

function addSubscriber(){
	global $db;
	$sql = "INSERT INTO data (name,phone,email) VALUES ('".$_POST['name']."','".$_POST['phone']."','".$_POST['email']."')";
	if (mysqli_query($db, $sql)) {
		print json_encode(true);
	} else {
		echo mysqli_error($db);
		print json_encode(false);
	}
}