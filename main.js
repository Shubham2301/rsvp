$(document).ready(function() {
    $("#startDatePicker").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true, //this option for allowing user to select month
        changeYear: true //this option for allowing user to select from year range
    });
    $("#endDatePicker").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true, //this option for allowing user to select month
        changeYear: true //this option for allowing user to select from year range
    });
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
            showListTable(JSON.parse(result));
        }
    });
}


function showSuccessAlert() {
    $(".alert").addClass("in");
}

$('#applyfilter_id').on('click', function() {
    var filter_form = $('#filter_form');
    var dataString = 'action=applyFilter&' + filter_form.serialize();
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataString,
        success: function(result) {
            showListTable(JSON.parse(result));
        }
    });
});




function showListTable(subscribers) {
    var html = '';
    var length = subscribers.length;
    for (var i = 0; i < length; i++) {
        var subscriber = subscribers[i];
        var row_html = '<tr>';
        row_html += '<td>' + subscriber['id'] + '</td>';
        row_html += '<td>' + subscriber['name'] + '</td>';
        row_html += '<td>' + subscriber['phone'] + '</td>';
        row_html += '<td>' + subscriber['gender'] + '</td>';
        row_html += '<td>' + subscriber['reg_date'] + '</td>';
        row_html += '<td><span class label label-success>' + subscriber['status'] + '</span></td>';
        row_html += '</tr>';
        html += row_html;
    }
    $('#table_id tbody').html(html);

}
