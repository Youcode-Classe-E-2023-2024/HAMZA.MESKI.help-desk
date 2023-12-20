<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I created</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>

<body class="font-sans bg-gray-100">

    <div id="USERID" value=<?php print $_SESSION['user-id']; ?>></div>

    <a href="home.php" class="block text-blue-500 hover:underline my-4 ml-4">Back</a>

    <section class="container mx-auto mt-8 p-6 bg-white rounded shadow">

        <table id="iCreatedTable" class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Ticket ID</th>
                    <th class="px-4 py-2">Assigned To</th>
                    <th class="px-4 py-2">Subject</th>
                    <th class="px-4 py-2">Department</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Priority</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

    </section>

    <!-- tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Local scripts -->
    <script src="scripts/iCreatedDT.js"></script>

</body>

</html>