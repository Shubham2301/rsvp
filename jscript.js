// jquery to apply ajax for form refreshing 
                   
                               
                            console.log("inside script");
                                 $(document).ready(function(){
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
             
