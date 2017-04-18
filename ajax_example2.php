<!DOCTYPE html>
<?php $db1= mysqli_connect('localhost','root','','eg1') or die("error connecting to mysqli server"); ?>
<html>
<head>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script>
  $(document).ready(function(){
    $("button").click(function(){
         var name=$("#name1").val();     //here we access teh name entered using the id.
         var phone=$("#phone1").val();
         var dataString= 'name='+name + '&phone='+phone;  // here the attribute in '' signifies the the  
                                                          // element name
                                                          console.log(name,phone);
                                                          $.ajax({type:"Post", url:"db1.php", data:dataString, success: function(result){
                                                            str="shubham was here";
                                                            console.log("ajax successful")
                                                            console.log(result)
                                                            $("div").html(str);
                                                          }});
                                                        });
  });
</script>
</head>

<body>
  <div><h2>Let AJAX change this text</h2></div>
  name:<input type="text" name="name" id="name1">  </br>
  phone no.:<input type="text" name="phone" id="phone1"> </br>
  <!--<?php echo $name; echo $phone; ?> -->
  <button>Press here</button>

  <?php 

  $query= "SELECT * FROM detail";
  $result= mysqli_query($db1,$query);
  while($row= mysqli_fetch_array($result)) { 
  echo $row['name']; echo "<br/>";
  echo $row['phone']; echo "<br/>";
         // $inc=1;
         // $row='';
    }
  mysqli_close($db1);

  ?>
</body>
</html>