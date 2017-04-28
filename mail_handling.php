<?php 
	require_once __DIR__ . '/vendor/mandrill/mandrill/src/Mandrill.php';
try {
    $mandrill = new Mandrill('v0tqtpCwhDCIOLFe5Hw-gA');
    $guests = fetchTableData();
    foreach ($guests as $guest) {
        $message = array(
            'html' => '<p>Test HTML content</p>',
            'text' => 'Sending test mail',
            'subject' => 'Testing',
            'from_email' => 'shubham@coloredcow.com',
            'from_name' => 'Shubham',
            'to' => array(
                array(
                    'email' => $guest['email'],
                    'name' => $guest['name'],
                    'type' => 'to'
                )
            ),
            
        );
        
        $result = $mandrill->messages->send($message);
        //print_r($result);

        /*
        Array
        (
            [0] => Array
                (
                    [email] => recipient.email@example.com
                    [status] => sent
                    [reject_reason] => hard-bounce
                    [_id] => abc123abc123abc123abc123abc123
                )
        
        )*/
    }    
    } 
    catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
    }
?>