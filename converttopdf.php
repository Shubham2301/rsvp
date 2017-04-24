<?php 
  require ("db_connect.php");
  require_once __DIR__ . '/vendor/autoload.php';
  require_once ("guest_list.php");

  
  ob_start();
  $contents=ob_get_contents();
  //var_dump($contents);
  die();
  ob_end_clean();
  $mpdf= new mPDF();
  $mpdf->Bookmark('Start of the document');

  //$mpdf->SetDisplayMode('fullpage');
  $mpdf->WriteHTML($contents);
  $mpdf->Output('result.pdf'); // output as inline content

	
?>