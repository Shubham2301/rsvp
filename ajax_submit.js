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

            $.ajax({
                type: "POST",
                url: "functions.php",
                data: dataString,
                success: function(result) {
                    if (result) {
                        getUpdatedList();
                    } else {
                        console.log('some error occurred');
                    }
                }
            });
        }
    });
});

function getUpdatedList() {
    $.ajax({
        type: "POST",
        url: "functions.php",
        data: 'action=getUpdatedList',
        success: function(result) {
            updateListTable(JSON.parse(result));
        }
    });
}

function updateListTable(subscribers) {
    var html = '';
    for (var i = 0; i < 10; i++) {
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
