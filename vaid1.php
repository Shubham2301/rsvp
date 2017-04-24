<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvy-xsfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!-- cdn for validations-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

    <title>FORM 1</title>

<h2> Validation ex. 1 </h2>
</head>

<body>
 
	<script type="text/javascript">
 		function validate(){ 
				var name1=$("#name_id").val();     //here we access teh name entered using the id.
  
				//var password=document.myform.password.value;  
                   $("#save_id").click(function() { 
					if (name1==null || name1==""){  
					  alert("Name can't be blank");  
					  return false;  
					}
				}
 		    }
 	</script>



 	<form method="post" action="#" id="reg_form" >
 		<div class="form-group">
 		<label for="name:">name</label>
 		<input type="text" name="name" id="name_id" required>
 	    </div>	
 	    <span type="button" name="save" id="save_id" class="btn btn-success">Save</span>
 	</form> 


</body>

</html>
