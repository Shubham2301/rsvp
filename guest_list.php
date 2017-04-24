<!DOCTYPE html>
<html>
  <head>
    <title> RSVP </title>



    <!--bootstrap starting script--> 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvy-xsfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!-- cdn for validations-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
    
  </head>

  </html>

<?php

	$db2= mysqli_connect('localhost','root','','guests') or die("error connecting to mysqli server");

	
	$query= "SELECT * FROM data";
	$result= mysqli_query($db2,$query);
	$inc=1;
	$row='';

	mysqli_close($db2);
?>


    <div class="row">
    	<div class = "col-md-12" style = "">
    		<h1>Guest List</h1>
    	</div>
    </div>

    <div class="row">
    <div class="col-md-12">
    	<table class="table" id="table_id">
    		<thead>
    			<tr>
    				<th>#</th>
    				<th>Name</th>
    				<th>Phone no.</th>
    				<th>Status</th>
    			</tr>
    		</thead>
    		<tbody>

          <?php while($row= mysqli_fetch_array($result)) { 

            switch ($row['status']) {
              case 'Confirmed':
              $label = 'success';
              break;
              case 'Rejected':
              $label = 'danger';
              break;  
              case 'Pending':
              default:
              $label = 'warning';
              break;
            }
            ?>
            <tr>    
              <th scope="row"><?php echo $inc; ?> </th> 
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['phone']; ?></td>
              <td><span class="label label-<?php echo $label; ?>"><?php echo $row['status']; ?> </span></td>      
            </tr>
            <?php $inc=$inc+1; 
            }//end of while ?>  
          </tbody>
        </table>
       

<!-- ?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new mPDF();
$html = '<bookmark content="Start of the Document" /><div>Section 1 text</div>';

$mpdf->WriteHTML(file_get_contents('guest_list.php'));

$mpdf->Output();
?> -->