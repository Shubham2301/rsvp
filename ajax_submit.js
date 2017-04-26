$(document).ready(function() {
    $('#save_id').on('click', function() {
        if (!$('#name_id')[0].checkValidity()) {
            $('#name_id')[0].reportValidity();
        } else if (!$('#phone_id')[0].checkValidity()) {
            $('#phone_id')[0].reportValidity();
        } else if (!$('#email_id')[0].checkValidity()) {
            $('#email_id')[0].reportValidity();
        } else {
            console.log('valid');
            var name = $("#name_id").val();
            var phone = $("#phone_id").val();
            var email = $("#email_id").val();
            var dataString = 'name=' + name + '&phone=' + phone + '&email=' + email; // here the attribute in ''    
            // signifies the element 'name'
            console.log(name, phone, email);

            $.ajax({
                type: "Post",
                url: "guest_db.php",
                data: dataString,
                success: function(result) {
                        console.log("below #form_id");
                        var ctr = 1;
                        var entry = "<tr><td>" + ctr + "</td><td>" + name + "</td><td>" + phone + "</td></tr>";
                        $('#table_id').append(entry);
                        $("#name_id").val('');
                        $("#phone_id").val('');
                        $("#email_id").val('');
                        ctr++;
                        console.log("ajax successful");
                    } //end of success
            }); // end of ajax
        }

    });
}); //end of ready
