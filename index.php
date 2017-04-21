  <!DOCTYPE html>

  <?php 
  $db1= mysqli_connect('localhost','root','','guests') or die("error connecting to mysqli server");
  ?>

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
      <form method="post" action="" id="reg_form">
        <div class="form-group">
          <label for="name:">name</label>
          <input type="text" class="form-control" name="name" id="name_id" placeholder="My name is..." required >
        </div>
      </br>

      <div class="form-group">
        <label for="phone:">phone</label>
        <input type="tel" class="form-control" name="phone" id="phone_id" placeholder="xxxxxxxxxx" pattern="^\d{10}$" required>
      </div>
    </br>

    <div class="form-group">
     <label for="email:">email</label>
     <input type="email" class="form-control" name="email" id="email_id" placeholder="abc@def.com" required>
   </div>
 </br>

 <span type="button" name="save" id="save_id" class="btn btn-success">Save</span>
 <button type="reject" name="Cancel" class="btn btn-danger">Cancel</button> 
 </br>
 </br>
 <!--<button type="button" name="g_list" id="g_list_id" action="guest_list.php" class="btn btn-primary">Click to see full guest list</button>
     -->
     <a href="guest_list.php">Click to see full guest list</a>
     
</form>
</div>
</div>
</div> <!-- inside 1st row now-->


<script>
  $(document).ready(function(){
    // var $myForm = $('#reg_form');
    //   if (!$myForm[0].checkValidity()) {
    //     // If the form is invalid, submit it. The form won't actually submit;
    //     // this will just cause the browser to display the native HTML5 error messages.
    //     $myForm.find(':submit').click();
    //   }

    function validator() {
           var name1=$("#name_id").val();     //here we access teh name entered using the id.
           var phone1=$("#phone_id").val();
           var email1=$("#email_id").val();
           if(name1==""|| phone1==""||email1==""){ 
           
          console.log("validation done");
           return true;
        }

    }


    $("#save_id").click(function() {   
            //alert("Hello");
           if(validator()== true){
            alert("Incomplete fields");
            return;
          }

           var name=$("#name_id").val();     //here we access teh name entered using the id.
           var phone=$("#phone_id").val();
           var email=$("#email_id").val();
           var dataString= 'name='+name + '&phone='+phone+'&email='+email;  // here the attribute in ''    
                                                                            // signifies the element 'name'
           console.log(name,phone,email);

           $.ajax({

              type:"Post", 
              url:"guest_db.php", 
              data:dataString, 
              success: function(result) {
             //$('#form_id').load('submission.php #form_id');
                  console.log("below #form_id");
                  var ctr=1
                  var entry="<tr><td>"+ctr+"</td><td>"+name+"</td><td>"+phone+"</td></tr>";
                  $('#table_id' ).append(entry);
                  $("#name_id").val('');
                  $("#phone_id").val('');
                  $("#email_id").val('');
                  ctr++;
                  console.log("ajax successful");
              }
            });
        });
  });


</script>




<div class = "col-md-6" style = "">
  <div id="after_ajax">
<?php 
$query= "SELECT * FROM data";
$result= mysqli_query($db1,$query);
$inc=1;
$row='';

mysqli_close($db1);
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

           <?php// while($row= mysqli_fetch_array($result)) {
           echo "inside table body"; 

            // switch ($row['status']) {
            //   case 'Confirmed':
            //   $label = 'success';
            //   break;
            //   case 'Rejected':
            //   $label = 'danger';
            //   break;  
            //   case 'Pending':
            //   default:
            //   $label = 'warning';
            //   break;
            // }
            ?> 
            <!-- <tr>    
              <th scope="row"><?php //echo $inc; ?> </th>  -->
              <!-- <td><?php //echo $row['name']; ?></td>
              <td><?php //echo $row['phone']; ?></td> -->
              <!-- <td><span class="label label-<?php //echo $label; ?>"><?php //echo $row['status']; ?> </span></td>      
            </tr> --> 
             <?php $inc=$inc+1;  ?>  
           </tbody> 
        </table>

      </div>
    </div>
  </div><!-- end of after_ajax-->
 </div><!-- end of column-->
 </div><!-- end of row-->
 </div><!-- end of container-->
</body> 
</html>