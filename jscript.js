// jquery to apply ajax for form refreshing 
                   
                               
<<<<<<< HEAD
                               
                              $(document).ready(function(){
=======
                            console.log("inside script");
                                 $(document).ready(function(){
>>>>>>> 81463dda2808c7e36198592a5f50532136f32b7a
                                 $("#save").click(function(){
                                 var name = $("#name").val();
                                 var phone = $("#phone").val();
                                 var email = $("#email").val();
                              
                              
                              // Returns successful data submission message when the entered information is stored in database.
                              var dataString = 'name1='+ name + '&phone1='+ phone + '&email1='+ email;
                              console.log(dataString);

                              if(name==''||phone==''||email=='')
                                {
                                 alert("Please Fill All Fields");
                                }
                                   
                              else
                              {
                               // AJAX Code To Submit Form.
                               $.ajax({
                               type: "POST",
                               url: "f.php",
                               data: dataString,
                               success: function(result){
                               console.log("ajax request complete");
                             
                              //alert(result);
                              }//end success
                              });//end ajax
                              }//end else
                              });//end click function
                              });//end ready function
             
