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
            <section class="w-full col-span-3 flex flex-col justify-center gap-5 px-12 bg-green-400">
                <?php require_once '../controller/TicketSection.php' ?>
                <form id="commentForm">
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label class="sr-only text-black">Your comment</label>
                        <textarea id="commentInput" name="comment" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Write a comment..." required></textarea>
                    </div>
                    <input type="hidden" name="ticket_id" value="<?php echo $_POST['ticketId'] ?>">
                    <input type="hidden" name="commenter_id" value="<?php echo $_SESSION['user-id'] ?>">
                    <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center bg-blue-600 ">
                        Post comment
                    </button>
                </form> 
            </section>
            <!-- comment input -->
            <section class="col-span-2 overflow-auto">
                <div id="child1">
                    <section id="comments_parent" class="h-full">
                        
                    </section>
                </div>
                <div id="child2" class="HIDDEN">
                    <nav class="flex justify-between mb-4">
                        <div></div>
                        <ion-icon name="close-outline" id="close_comment_section" class="cursor-pointer text-2xl font-bold"></ion-icon>
                    </nav>
                    <div class="h-full flex justify-center items-center">
                        <main class="p-2 flex justify-center items-center">
                            <div class="max-w-md mx-auto">
                                <form id="delete_comment_form" class="mb-4">
                                    <button type="submit" class="bg-red-600 text-white p-2 rounded-md w-full">Delete</button>
                                </form>
                                <form id="update_comment_form">
                                    <label class="block text-sm font-semibold mb-2">Write a new Comment</label>
                                    <textarea name="newComment" class="border-2 p-2 w-full text-sm text-gray-900 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Write a comment..." required></textarea>
                                    <button type="submit" class="border-2 bg-blue-600 text-white p-2 rounded-md w-full mt-4">Update</button>
                                </form>
                            </div>
                        </main>
                    </div>
                </div>
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
    <script src="scripts/commentsSection.js"></script>
</body>
</html>