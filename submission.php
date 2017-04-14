<!DOCTYPE html>

<?php 
   $db= mysqli_connect('localhost','root','','guests') or die("error connecting to mysqli server");
 ?>

<html>
<head>
      <title> RSVP </title>

        <!--bootstrap starting script--> 
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvy-xsfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>



<body>

                  <!--navbar code-->
<nav class = "navbar navbar-default" role = "navigation">
   
   <div class = "navbar-header">
      <a class = "navbar-brand" href = "#">EVENT</a>
   </div>

    <div>
      <ul class = "nav navbar-nav navbar-right" style= "margin-right: 0">
         <li class = ""><a href = "#">Home</a></li>
      </ul>
    </div>

   </nav>

        <!-- Gird layout starts here-->

<div class = "container">
   
   
   <div class = "row">
   
      <div class = "col-md-6 "  style = "">
         
         <div class = "row">
         <div class="col-md-12">
            <h1>Register New Guest</h1>
         </div>
         </div>

         <div class = "row">
            <div class="col-md-12">

                        


             <form method="post" action="f.php">
              <div class="form-group">
                <label for="name:">name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="My name is...">
                            

              </div>
  </br>

              <div class="form-group">
                <label for="phone:">phone</label>
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="you can call me on...">
              </div>
  </br>
 
              <div class="form-group">
                <label for="email:">email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="abc@def.com">
              </div>
  </br>
  
                <button type="submit" name="save" class="btn btn-success">Save</button>
                <button type="reject" name="Cancel" class="btn btn-danger">Cancel</button>

            </form>

<?php 
                      
              if(isset($_POST['save']))
              {    
                  $reg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
                if((preg_match("/[^0-9]/", '', $str)) && strlen($str) == 10 && (preg_match($reg,email))) 
                  {         
                      
                      //inserting the data into the table.
                      $sql = "INSERT INTO data (name, phone, email)
                      VALUES ('".$_POST["name"]."','".$_POST["phone"]."','".$_POST["email"]."')";

                      if (mysqli_query($db,$sql)) {
                        //echo "entry done";
                      } else {

                        echo "error in Insering data". mysqli_error($db);
                      }
                  }
                    else{
                      echo "error in entered fields"; 
                        }
              }

                      $query= "SELECT * FROM data";
                      $result= mysqli_query($db,$query);
                      $inc=1;
                      $row='';

                      mysqli_close($db);
                      
                      
                   ?>
 
            </div>
     </div>
      </div>


                  

      <div class = "col-md-6" style = "">

        <div class="row">
            <div class = "col-md-12" style = "">
              <h1>Guest List</h1>
            </div>
         
            <div class="col-md-12">
      <table class="table">
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
      
            </div>
         
        </div>
      </div>
   </div>
   </div>

</body> 
</html>