<?php 

require_once 'functions.php';

if(isset($_POST['action'])){
	switch ($_POST['action']) {
		case 'getUpdatedList':
			print json_encode(fetchTableData());
			break;
		case 'addSubscriber':
			print json_encode(addSubscriber($_POST['name'], $_POST['phone'], $_POST['email']));
			break;
	}
}
?>