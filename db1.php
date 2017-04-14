	<?php
	$db= mysqli_connect('localhost','root','','eg1') or die("error connecting to mysqli server");

	$sql = "INSERT INTO detail (name, phone)
	VALUES ('".$_POST["name"]."','".$_POST["phone"].")";

	if (mysqli_query($db,$sql)) {
	echo "entry done";
	} else {

	echo "error in Insering data". mysqli_error($db);
	} 