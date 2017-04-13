 <?php
				// comment for Shubham
             $db= mysqli_connect('localhost','root','','guests') or die("error connecting to mysqli server");           

				//inserting the data into the table.
                                $sql = "INSERT INTO data (name, phone, email)
                                VALUES ('".$_POST["name"]."','".$_POST["phone"]."','".$_POST["email"]."')";

                                if (mysqli_query($db,$sql)) {
                                  //echo "entry done";
                                } else {

                                  echo "error in Insering data". mysqli_error($db);
                                } 

		                          $query= "SELECT * FROM data";
				                  $result= mysqli_query($db,$query);
				                  echo $result;
				                 // $inc=1;
				                 // $row='';

                      mysqli_close($db);
                                ?>
