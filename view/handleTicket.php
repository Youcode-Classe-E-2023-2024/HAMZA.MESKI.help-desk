<?php
// print '<pre>';
// print_r($_POST);
// print '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handle Ticket</title>
</head>

<body>
    <section class="h-screen">
        <!-- component -->
        <main>
            <a href="home.php">back</a>
        </main>
        <div class=" bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                </div>
                <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                    <div class="max-w-md mx-auto">
                        <div>
                            <h1 class="text-2xl font-semibold">Login Form with Floating Labels</h1>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <form id="handleForm" class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div>
                                    <strong>ID of the creator:</strong> <?php print $_POST['created_by'] ?>
                                </div>
                                <div>
                                    <strong>Subject:</strong> <?php print $_POST['subject'] ?>
                                </div>
                                <div>
                                    <strong>departments:</strong><?php print $_POST['department']?>
                                </div>
                                <div>
                                    <strong>status:</strong><?php print $_POST['status'] ?>
                                </div>
                                <div>
                                    <strong>priority:</strong><?php print $_POST['priority'] ?>
                                </div>
                                <input type="hidden" name="ticket_id" value="<?php print $_POST['ticket_id'] ?>">
                                <select name="status" id="">
                                    <option value="todo">todo</option>
                                    <option value="doing">doing</option>
                                    <option value="done">done</option>
                                </select>
                                <div class="relative">
                                    <button type="submit" class="bg-blue-500 text-white rounded-md px-2 py-1">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="scripts/handle.js"></script>
</body>

</html>