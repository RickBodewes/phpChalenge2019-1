$(document).ready(function () {
    var date = "";
    var d = new Date();
    date += d.getFullYear() + "-";
    if (d.getMonth() < 9) {
        date += "0" + (d.getMonth() + 1) + "-";
    } else {
        date += d.getMonth() + 1 + "-";
    }
    date += d.getDate();
    $('#dateInput').val(date);
    $('#dateSelect').val(date);

    $('#dateSelect').on('input', function () {
        $.ajax({
            url: 'list.php',
            type: 'get',
            data: {
                date: $('#dateSelect').val(),
            },
            success: function (data) {
                $('#list').html(data);
            }
        });
    });

});
