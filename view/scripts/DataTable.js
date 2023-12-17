$(document).ready(function() {
    $('#DataTable').DataTable({
        "ajax": "your_server_endpoint_to_get_data.php", // Replace with your server endpoint
        "columns": [
            {"data": "id"},
            {"data": "created_by"},
            {"data": "subject"},
            {"data": "departement_id"},
            {"data": "status"},
            {"data": "priority"}
        ]
    });
});