<?php 

require_once 'functions.php';

if(isset($_POST['action']))
{
	switch ($_POST['action']) 
	{
		case 'getUpdatedList':
			print json_encode(fetchTableData());
			break;
		case 'addSubscriber':
			if((isset($_POST['name']))&&(isset($_POST['phone']))&&(isset($_POST['email']))&&(isset($_POST['gender'])))
			{
				print json_encode(addSubscriber($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['gender']));
				break;
			}
			else
			{
				echo "Error in adding subscriber";
				break;
			}
		case 'applyFilter': 	
			if((isset($_POST['status']))&&(isset($_POST['gender']))&&(isset($_POST['limit']))&&(isset($_POST['start_date']))&&(isset($_POST['end_date'])))
			{
				print json_encode(applyFilter($_POST['status'], $_POST['gender'], $_POST['limit'], $_POST['start_date'], $_POST['end_date']));
				break;
			}		
	}
}
