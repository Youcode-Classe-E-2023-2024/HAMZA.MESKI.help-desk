$(document).ready(function() {
    $('#DataTable').DataTable({
        "ajax": {
            "url": "../controller/PersonalTicketsController/TicketsJSON.php",
            "dataSrc": ""
        },
        "columns": [
            {"data": "id"},
            {"data": "created_by"},
            {"data": "subject"},
            {"data": "departement_id"},
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