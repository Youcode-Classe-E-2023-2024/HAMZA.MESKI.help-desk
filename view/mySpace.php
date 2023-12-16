<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HELP DESK</title>
</head>
<body>
    <!-- father -->
    <section id="home_father" class="h-screen ">
        <nav class="h-20 bg-pink-500 flex justify-between px-2">
            <div></div>
            <?php require_once '../controller/LoggerDispaly.php' ?>
        </nav>
        
    </section>
    <!-- tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ionicons script -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- local scripts -->
    <script src="scripts/switchingPages.js"></script>
</body>
</html>