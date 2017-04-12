 <?php
                                //inserting the data into the table.
                                $sql = "INSERT INTO data (name, phone, email)
                                VALUES ('".$_POST["name"]."','".$_POST["phone"]."','".$_POST["email"]."')";

                                if (mysqli_query($db,$sql)) {
                                  //echo "entry done";
                                } else {

                                  echo "error in Insering data". mysqli_error($db);
                                } ?>