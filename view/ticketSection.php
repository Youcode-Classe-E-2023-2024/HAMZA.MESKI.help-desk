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

        <main class="h-[88.6%] grid grid-cols-5">
            <section class="w-full col-span-3 flex items-center px-12 bg-green-400">
                <article name="ticketId" value="$ticket->id" class="w-[80%] bg-white shadow-md p-6 rounded-lg h-[296px] cursor-pointer text-left">
                    <div class="mb-4">
                        <strong class="text-gray-700">Ticket ID:</strong> $ticket->id
                    </div>
                    <div class="mb-4">
                        <strong class="text-gray-700">Subject:</strong> $ticket->subject
                    </div>
                    <div class="mb-4">
                        <strong class="text-gray-700">Department:</strong> $department->departement
                    </div>
                    <div class="mb-4">
                        <strong class="text-gray-700">Status:</strong> $ticket->status
                    </div>
                    <div class="mb-4">
                        <strong class="text-gray-700">Created by:</strong> $ticket->created_by
                    </div>
                    <div>
                        <strong class="text-gray-700">Assigned to:</strong> $ticket->assigned_to
                    </div>
                </article>
            </section>
            <section id="commentSection" class="col-span-2 h-full ">

            </section>
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