<?php

	$db= mysqli_connect('localhost','root','','guests') or die("error connecting to mysqli server");

	$sql = "INSERT INTO data(name,phone,email) VALUES ('".$_POST['name']."','".$_POST['phone']."','".$_POST['email']."')";
	
	/*echo "inside database"; 
	echo "<br/>";

	echo $_POST["name"];
	echo "<br/>";
	echo $_POST["phone"];
	echo "<br/>";
    */

	if (mysqli_query($db,$sql)) {
		echo 'true';
	} else {

	echo "error in Insering data ". mysqli_error($db);
	} 
?>