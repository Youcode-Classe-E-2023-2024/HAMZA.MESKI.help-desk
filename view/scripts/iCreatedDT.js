let displayUsersById;

fetch('../controller/PersonalTicketsController/UsersJSON.php')
  .then(response => response.json())
  .then(data => {
    console.log('User data:', data); // Log data to inspect its structure

    // Assuming data is an array of users with 'id' and 'firstname' properties
    displayUsersById = function(userId) {
      const user = data.find(user => user.id === userId);
      return user ? `${user.firstname} ${user.lastname}` : 'Unknown User';
    };

    // Initialize DataTable and event handling here
    const USERID = document.getElementById('USERID');
    const formData = {
      userId: USERID.getAttribute('value'),
    };
    var taskTable = $('#iCreatedTable').DataTable({
      "ajax": {
        "url": "../controller/PersonalTicketsController/TicketsJSON2.php",
        "dataSrc": "",
        "data": formData,
        "type": 'POST',
      },
      "columns": [
        { "data": "id" },
        {
          "data": "assigned_to",
          "render": function(data) {
            // Call the displayUsersById function to get the user name
            return displayUsersById(data);
          }
        },
        { "data": "subject" },
        { "data": "department", 
            "render": function (data) {
                // Format the department values
                let newData = data.replace(/&/g, ' - ')
                let lastIndex = newData.lastIndexOf('-');

                if (lastIndex !== -1) {
                    newData = newData.slice(0, lastIndex) + ' ' + newData.slice(lastIndex + 1);
                }
                return newData;
            }   
        },
        { "data": "status" },
        { "data": "priority" },
        {
          data: 'id',
          render: function(data) {
            return '<section class="flex gap-2">' +
              '<form action="updateMyTicketEdit.php" method="post">' +
              '<button name="btn" class="text-blue-500 hover:underline mr-2">Edit</button>' +
              '<input name="ticket_id" type="hidden" value="' + data + '">' +
              '</form>' +
              '<button class="delete_btn text-red-500 hover:underline focus:outline-none focus:ring focus:border-red-300" data-id="' + data + '">Delete</button>' +
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
  })
  .catch(error => {
    console.error('Error fetching user data:', error);
  });
