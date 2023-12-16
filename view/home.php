<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HELP DESK</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <!-- father -->
    <section id="home_father" class="h-screen ">
        <nav class="h-20 bg-pink-500 flex justify-between px-2">
            <div></div>
            <?php require_once '../controller/logger.php' ?>
        </nav>
        <!-- child1 -->
        <section id="home_child1" class="h-[88.6%]">
            <section id="home_child1_son" class=" w-full h-full bg-green-400 grid grid-cols-5">
                <main id="open_section" class=" h-full flex items-center HIDDEN">
                    <ion-icon name="chevron-forward-outline" id="open_icon" class="text-3xl cursor-pointer"></ion-icon>
                </main>
                <main id="close_section" class=" col-span-1 bg-white flex items-center justify-end gap-2 px-2">
                    <div class="text-2xl flex flex-col gap-3 flex-grow">
                        <div class="border border-black rounded-md px-3 py-2 hover:bg-black hover:text-white transition-all duration-500 text-center cursor-pointer">✔ My Tasks</div>
                        <div class="border border-black rounded-md px-3 py-2 hover:bg-black hover:text-white transition-all duration-500 text-center cursor-pointer">🦾 I created</div>
                        <div class="border border-black rounded-md px-3 py-2 hover:bg-black hover:text-white transition-all duration-500 text-center cursor-pointer">👽 All</div>
                    </div>
                    <ion-icon name="chevron-back-outline" id="close_icon" class="text-3xl cursor-pointer"></ion-icon>
                </main>
                <!-- All the tickets will appear here -->
                <form id="tickets_container" class="w-full col-span-4 grid grid-cols-3 p-3 gap-x-3 gap-y-6 overflow-auto">
                    <?php require_once '../controller/TicketContainer.php' ?>
                </form>
            </section>
        </section>
        <!-- child2 -->
        <section id="home_child2" class="HIDDEN w-full h-[88.6%] bg-red-400">
           
        </section>
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