$(document).ready(function() {
    $('#save_id').on('click', function() {
        if (!$('#name_id')[0].checkValidity()) {
            $('#name_id')[0].reportValidity();
        } else if (!$('#phone_id')[0].checkValidity()) {
            $('#phone_id')[0].reportValidity();
        } else if (!$('#email_id')[0].checkValidity()) {
            $('#email_id')[0].reportValidity();
        } else {
            var name = $("#name_id").val();
            var phone = $("#phone_id").val();
            var email = $("#email_id").val();
            var action = 'addSubscriber';
            var dataString = 'action=' + action + '&name=' + name + '&phone=' + phone + '&email=' + email;
            $("#name_id").val("");
            $("#phone_id").val("");
            $("#email_id").val("");

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: dataString,
                success: function(result) {
                    if (result.match(/success/gi)) {
                        console.log("getUpdatedList will execute");
                        getSuccessAlert();
                        getUpdatedList();
                    } else if (result.match(/duplicate_entry/gi)) {
                        alert('Input values already registered.')
                    } else {
                        console.log('some error occured. Failed.')
                    }
                }
            });
        }
    });
});

function getUpdatedList() {
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: 'action=getUpdatedList',
        success: function(result) {
            updateListTable(JSON.parse(result));
        }
    });
}

function updateListTable(subscribers) {
    var html = '';
    //var count = getEntriesCount();

    var length = subscribers.length;
    console.log(length);
    for (var i = 0; i < length; i++) {
        var subscriber = subscribers[i];
        var row_html = '<tr>';
        row_html += '<td>' + subscriber['id'] + '</td>';
        row_html += '<td>' + subscriber['name'] + '</td>';
        row_html += '<td>' + subscriber['phone'] + '</td>';
        row_html += '<td>' + subscriber['status'] + '</td>';
        row_html += '</tr>';
        html += row_html;
    }
    $('#table_id tbody').html(html);

}

function getSuccessAlert() {
    $("alert").addClass("in");
    return true;
}
