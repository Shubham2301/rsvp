$(document).ready(function() {
    $('#save_id').on('click', function() {
        var reg_form = $('#reg_form');

        if (!reg_form[0].checkValidity()) {
            reg_form[0].reportValidity();
            return;
        }

        var dataString = 'action=addSubscriber&' + reg_form.serialize();

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            success: function(result) {
                if (result.match(/success/gi)) {
                    console.log("getUpdatedList will execute");
                    showSuccessAlert();
                    showUpdatedList();
                } else if (result.match(/duplicate_entry/gi)) {
                    alert('Input values already registered.')
                } else {
                    console.log('some error occured. Failed.');
                }
                $("#reg_form")[0].reset();
            }
        });
    });
});

function showUpdatedList() {
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: 'action=getUpdatedList',
        success: function(result) {
            console.log("get getUpdatedList ajax executed");
            showListTable(JSON.parse(result));
        }
    });
}

function showListTable(subscribers) {
    console.log("abcd");
    var html = '';
    var length = subscribers.length;
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

function showSuccessAlert() {
    console.log("inside get success alert");
    $(".alert").addClass("in");
}
