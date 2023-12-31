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
                    {"data": "department", 
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
                    {"data": "status"},
                    {"data": "priority"},
                    {
                        
                            data: 'id',
                            render: function (data, type, row) {
                                return '<form action="handleTicket.php" method="post">' +
                                    '<button type="submit" name="btn" class="text-blue-500 hover:underline mr-2">Handle</button>' +
                                    '<input name="ticket_id" type="hidden" value="' + data + '">' +
                                    '<input name="created_by" type="hidden" value="' + row.created_by + '">' +
                                    '<input name="subject" type="hidden" value="' + row.subject + '">' +
                                    '<input name="department" type="hidden" value="' + row.department + '">' +
                                    '<input name="status" type="hidden" value="' + row.status + '">' +
                                    '<input name="priority" type="hidden" value="' + row.priority + '">' +
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
