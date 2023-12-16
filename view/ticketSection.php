<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>HELP DESK</title>
</head>
<body>
    <!-- father -->
    <section id="home_father2" class="h-screen ">
        <nav class="h-20 bg-pink-500 flex justify-between items-center cursor-pointer px-2">
            <a href="home.php">HOME</a>
            <?php require_once '../controller/LoggerDispaly.php' ?>
        </nav>

        <!-- child1  -->
        <main id="ticketSection_child1" class="h-[88.6%] grid grid-cols-5">
            <section class="w-full col-span-3 flex items-center px-12 bg-green-400">
                <?php require_once '../controller/TicketSection.php' ?>
            </section>
            <section id="commentSection" class="col-span-2 h-full ">

            </section>
        </main>

        <!-- child2  -->
        <main id="ticketSection_child2" class="HIDDEN w-full h-[88.6%] bg-red-400">

        </main>

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