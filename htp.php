<?php

require __DIR__ . 'vendor/autoload.php';
use mikehaertl\wkhtmlto\Pdf;

// Create a new Pdf object with some global PDF options
$pdf = new Pdf(array(
    'binary' => 'wkhtmltopdf',
    'no-outline',         // Make Chrome not complain
    'margin-top'    => 0,
    'margin-right'  => 0,
    'margin-bottom' => 0,
    'margin-left'   => 0,

    // Default page options
    'disable-smart-shrinking',
    //'user-style-sheet' => '/path/to/pdf.css',
));

// Add a page. To override above page defaults, you could add
// another $options array as second argument.
// try {
	$pdf->addPage('Users/shubhamjoshi/projects/rsvp/htmltopdf.html');
// 	$pdf->send();
// } catch (Exception $e) {
// 	var_dump("error occured:" . $e);	
// }
if (!$pdf->saveAs('Users/shubhamjoshi/projects/rsvp/page.pdf')) {
    echo $pdf->getError();
    }

?>