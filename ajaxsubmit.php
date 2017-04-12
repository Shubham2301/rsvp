<?php
$connection = mysqli_connect("localhost", "root", "","guests"); // Establishing Connection with Server..
$db = mysqli_select_db("guests", $connection); // Selecting Database
//Fetching Values from URL
$name2=$_POST['name1'];
$phone2=$_POST['phone1'];
$email2=$_POST['email1'];

//Insert query
$query = mysqli_query("insert into form_element(name, phone, email) values ('$name2', '$phone2', '$email2')");
echo "Form Submitted Succesfully";
mysqli_close($connection); // Connection Closed
?>