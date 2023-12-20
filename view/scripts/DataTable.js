const USERID = document.getElementById('USERID');
console.log(USERID.getAttribute('value'));
$(document).ready(function() {
    const formData = {
        userId: USERID.getAttribute('value'),
    }
    $('#DataTable').DataTable({
        "ajax": {
            "url": "../controller/PersonalTicketsController/TicketsJSON.php",
            "dataSrc": "",
            "data": formData,
            "type": 'POST', 

        },
        "columns": [
            {"data": "created_by"},
            {"data": "subject"},
            {"data": "department"},
            {"data": "status"},
            {"data": "priority"}, 
            {
                data: 'id',
                render: function(data) {
                    return  '<form action="handleTicket.php" method="post">'+
                                '<button type="submit" name="btn" class="text-blue-500 hover:underline mr-2">Handle</button>' +
                                '<input name="ticket_id_DT" type="hidden" value="' + data + '">' +
                            '</form>';
                }
            }
        ]
    });
});
