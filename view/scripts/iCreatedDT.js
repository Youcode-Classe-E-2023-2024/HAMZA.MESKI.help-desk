const USERID = document.getElementById('USERID');
$(document).ready(function() {
    const formData = {
        userId: USERID.getAttribute('value'),
    }
    var taskTable = $('#iCreatedTable').DataTable({
        "ajax": {
            "url": "../controller/PersonalTicketsController/TicketsJSON2.php",
            "dataSrc": "",
            "data": formData,
            "type": 'POST', 
        },
        "columns": [
            {"data": "id"},
            {"data": "assigned_to"},
            {"data": "subject"},
            {"data": "department"},
            {"data": "status"},
            {"data": "priority"},
            {
                data: 'id',
                render: function(data) {
                    return '<section class="flex gap-2">'+
                                '<form action="updateMyTicketEdit.php" method="post">' +
                                    '<button name="btn" class="text-blue-500 hover:underline mr-2">Edite</button>' +
                                    '<input name="task_id" type="hidden" value="' + data + '">' +
                                '</form>' +
                                '<button class="delete_btn text-red-500 hover:underline focus:outline-none focus:ring focus:border-red-300" data-id="' + data + '">Delete</button>'+
                            '</section>';
                }
            }
        ]
    });

    $('#iCreatedTable').on('click', '.delete_btn', function() {
        var userId = $(this).data('id');
        console.log('Delete button clicked for user ID:', userId);
    
        // Perform your delete logic here or show a confirmation dialog
        var confirmDelete = confirm('Are you sure you want to delete user with ID ' + userId + '?');
    
    
        if (confirmDelete) {
            $.ajax({
                url: '../controller/PersonalTicketsController/DeleteTicket.php', 
                method: 'POST',
                data: {
                    delete_btn: true,
                    id_user: userId
                },
                success: function(response) {
                    console.log(response);

                    // Remove the row from the DataTable
                    taskTable.row($(this).closest('tr')).remove().draw();
    
                    location.reload();
                },
                error: function(error) {
                    console.error('Error deleting user:', error);
                }
            });
        }
    });
});
// console.log(USERID.getAttribute('value'));