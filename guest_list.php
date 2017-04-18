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
            <?php $inc=$inc+1; } ?> 
          </tbody>
        </table>
