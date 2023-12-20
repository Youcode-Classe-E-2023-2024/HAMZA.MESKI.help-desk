const USERID = document.getElementById('USERID');
console.log(USERID.getAttribute('value'));

$(document).ready(function () {
    const formData = {
        userId: USERID.getAttribute('value'),
    };

    let displayUsersById; // Initialize the function

    // Fetch user data
    fetch('../controller/PersonalTicketsController/UsersJSON.php')
        .then(response => response.json())
        .then(data => {
            // Convert data array to an object for easier lookup
            const usersData = {};
            data.forEach(user => {
                usersData[user.id] = user;
            });

            // Initialize displayUsersById function
            displayUsersById = function (userId) {
                const user = usersData[userId];
                return user ? `${user.firstname} ${user.lastname}` : 'Unknown User';
            };

            // Initialize DataTable
            $('#DataTable').DataTable({
                "ajax": {
                    "url": "../controller/PersonalTicketsController/TicketsJSON.php",
                    "dataSrc": "",
                    "data": formData,
                    "type": 'POST',
                },
                "columns": [
                    {
                        "data": "created_by",
                        "render": function (data) {
                            // Call the displayUsersById function to get the user name
                            return displayUsersById(data);
                        }
                    },
                    {"data": "subject"},
                    {"data": "department"},
                    {"data": "status"},
                    {"data": "priority"},
                    {
                        data: 'id',
                        render: function (data) {
                            return '<form action="handleTicket.php" method="post">' +
                                '<button type="submit" name="btn" class="text-blue-500 hover:underline mr-2">Handle</button>' +
                                '<input name="ticket_id_DT" type="hidden" value="' + data + '">' +
                                '</form>';
                        }
                    }
                ]
            });
        })
        .catch(error => {
            console.error('Error fetching user data:', error);
        });
});
