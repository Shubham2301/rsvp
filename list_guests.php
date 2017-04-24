<?php

	$db2= mysqli_connect('localhost','root','','guests') or die("error connecting to mysqli server");

	
	$query= "SELECT * FROM data";
	$result= mysqli_query($db2,$query);
	$inc=1;
	$row='';

	mysqli_close($db2);

  require_once __DIR__ . '/vendor/autoload.php';


 $html=         
      $mpdf = new mPDF();

      $mpdf->WriteHTML($html);

      $mpdf->Output();   
  ?>