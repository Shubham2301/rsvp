console.log("in script.js");

$(document).ready(function(){
$("#submit").click(function(){
var name = $("#name").val();
var phone = $("#phone").val();
var email = $("#email").val();

// Returns successful data submission message when the entered information is stored in database.
var dataString = 'name1='+ name + '&phone1='+ phone + '&email1='+ email;
if(name==''||phone==''||email=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "ajaxsubmit.php",
data: dataString,
cache: false,
success: function(result){
alert();
}
});
}
return false;
});
});