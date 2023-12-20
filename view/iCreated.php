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

<body>
    <div id="USERID" value=<?php print $_SESSION['user-id']; ?>></div>
    <section>
        <table id="iCreatedTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ticket id</th>
                    <th>assigned to</th>
                    <th>subject:</th>
                    <th>department:</th>
                    <th>status:</th>
                    <th>priority:</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </section>
    <!-- locat scripts -->
    <script src="scripts/iCreatedDT.js"></script>
</body>
</html>