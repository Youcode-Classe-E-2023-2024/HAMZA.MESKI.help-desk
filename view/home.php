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
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>

<body>
    <div id="USERID" value=<?php print $_SESSION['user-id']; ?>></div>
    <!-- father -->
    <section id="home_father" class="h-screen ">
        <nav class="h-20 bg-pink-500 flex items-center justify-between px-2">
            <div>
                <a href="../signup.php">Log-out</a>
            </div>
            <?php require_once '../controller/LoggerDispaly.php' ?>
        </nav>
        <!-- child1 -->
        <section id="home_child1" class=" h-[88.6%]">
            <section id="home_child1_son" class=" w-full h-full bg-green-400 grid grid-cols-5">
                <main id="open_section" class=" h-full flex items-center HIDDEN">
                    <ion-icon name="chevron-forward-outline" id="open_icon" class="text-3xl cursor-pointer"></ion-icon>
                </main>
                <main id="close_section" class=" col-span-1 bg-white flex items-center justify-end gap-2 px-2">
                    <div class="text-2xl flex flex-col gap-3 flex-grow">
                        <div class="border border-black rounded-md px-3 py-2 hover:bg-black hover:text-white transition-all duration-500 text-center cursor-pointer" id="iCreated">🦾 I created</div>
                        <div class="border border-black rounded-md px-3 py-2 hover:bg-black hover:text-white transition-all duration-500 text-center cursor-pointer" id="all">👽 All</div>
                        <div class="border border-black rounded-md px-3 py-2 hover:bg-black hover:text-white transition-all duration-500 text-center cursor-pointer" id="priority">⏳ Priority</div>
                    </div>
                    <ion-icon name="chevron-back-outline" id="close_icon" class="text-3xl cursor-pointer"></ion-icon>
                </main>
                <!-- All the tickets will appear here -->
                <main id="tickets_container" class="w-full col-span-4 grid grid-cols-3 p-3 gap-x-3 gap-y-6 overflow-auto">
                    <?php require_once '../controller/TicketContainer.php' ?>
                </main>
            </section>
        </section>
        <!-- child2 -->
        <div id="userId" userId="<?php echo $_SESSION['user-id'] ?>"></div>
        <section id="home_child2" class="HIDDEN w-full h-[88.6%] container mx-auto p-6 rounded-lg shadow">
            <main class="flex justify-between mb-6">
                <div></div>
                <div class="flex gap-1">
                    <a href="iCreated.php" class="bg-blue-400 rounded-md p-2">I Created</a>
                    <form action="assignTicket.php">
                        <input type="hidden" name="" value="">
                        <button type="submit" class="bg-green-400 rounded-md p-2">create ticket</button>
                    </form>
                </div>
            </main>
            <table id="DataTable" class="min-w-full bg-white border border-gray-300 shadow-md rounded-md overflow-hidden">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                    <th class="py-2 px-4">Created By</th>
                    <th class="py-2 px-4">Subject</th>
                    <th class="py-2 px-4">Department</th>
                    <th class="py-2 px-4">Status</th>
                    <th class="py-2 px-4">Priority</th>
                    <th class="py-2 px-4">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

        </section>
    </section>
    <!-- tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ionicons script -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- local scripts -->
    <script src="scripts/switchingPages.js"></script>
    <script src="scripts/DataTable.js"></script>
    <script src="scripts/filter.js"></script>
    <script src="scripts/index.js"></script>
</body>

</html>