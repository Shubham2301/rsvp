<!DOCTYPE html>

<?php
    require_once "functions.php"; 
?>

<html>
    <head>
        <title> RSVP </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvy-xsfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <!-- cdn for validations-->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

        <script type="text/javascript" src="ajax_submit.js" async defer></script>
        <!-- <script type="text/javascript" src="field_validation.js"></script> -->

    </head>

    <body>
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
        <div class="alert alert-success fade " role="alert" id="success_alert" ><STRONG>Success:</STRONG>Your have successfully registered to our guest list.</div>
        <div class = "container">
            <div class = "row">
                <div class = "col-md-6">
                    <div class = "row">
                        <div class="col-md-12">
                            <h1>Register New Guest</h1>
                        </div>
                    </div>
                    <div class = "row">
                        <div class="col-md-12">
                            <form id="reg_form">
                                <div class="form-group">
                                    <label for="name:">name</label>
                                    <input type="text" class="form-control" name="name" id="name_id" placeholder="My name is..." required="true" autofocus="">
                                </div>
                                </br>
                                <div class="form-group">
                                    <label for="phone:">phone</label>
                                    <input type="number" class="form-control" name="phone" id="phone_id" placeholder="xxxxxxxxxx" pattern="^\d{10}$" required="true">
                                </div>
                                </br>
                                <div class="form-group">
                                    <label for="email:">email</label>
                                    <input type="email" class="form-control" name="email" id="email_id" placeholder="abc@def.com" required="true">
                                </div>
                                 </br>
                                <button type="button" name="save" id="save_id" class="btn btn-success">Save</button>
                                
                                <button type="reject" name="Cancel" class="btn btn-danger">Cancel</button>
                                </br>
                                <a href="pdf.php" target="_blank">Click to see full guest list</a> 
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class = "col-md-6">
                    <div class="row">
                        <div class = "col-md-12">
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
                                    <?php
                                        $guests = fetchTableData();
                                        foreach ($guests as $guest) {
                                        ?>
                                            <?php if($guest['status']=='confirmed'){
                                                     $status_class='btn-danger'; 
                                                  }
                                                  else if ($guest['status']=='pending'){
                                                    $status_class='btn-warning'; 
                                                  } 
                                                  else
                                                  $status_class='btn-danger';  
                                            ?>        
                                                   
                                         
                                            <tr>
                                                <td><?php echo $guest['id']; ?></td>
                                                <td><?php echo $guest['name']; ?></td>
                                                <td><?php echo $guest['phone']; ?></td>
                                                <td><button type = "button" class = "btn <?php echo "$status_class"; ?>" ><?php echo $guest['status']; ?> </button></td> 
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </body> 
</html>