<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ticket</title>
</head>

<body>
    <!-- component -->
    <section id="contact" class="relative w-full min-h-screen bg-black text-red-500">
        <a href="home.php" class="text-4xl p-4 font-bold tracking-wide">
            Back
        </a>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-800 h-32 w-full"></div>

        <!-- Assingment form -->
        <form action="../controller/assignTicketController/assignTicket.php" method="post" class="relative p-5 lg:px-20 flex flex-col md:flex-row items-center justify-center">
            <main class="flex justify-between w-full">
                <div class="w-full md:w-1/2 p-5 md:px-0 mx-5">
                    <div class="bg-gray-900 border border-red-500 w-full h-full p-5 pt-8">
                        <h3 class="text-2xl font-semibold mb-5">
                            Select Users
                        </h3>
                        <input type="text" id="searchUsers" class="mb-2"><br>
                        <section class="h-40 overflow-auto">
                            <!-- 1.input as check-box for users -->
                            <?php require '../controller/assignTicketController/displayUsers.php' ?>
                        </section>
                    </div>
                </div> 
    
                <div class="w-full md:w-1/2 p-5 md:px-0 mx-5">
                    <div class=" bg-gray-900 border border-red-500 w-full h-full p-5 pt-8">
                        <h3 class="text-2xl font-semibold mb-5">
                            Select Departments
                        </h3>
                        <input type="text" id="searchDepartments" class="mb-2"><br>
                        <section class="h-40 overflow-auto">
                            <!-- 2.input as check-box for departments -->
                            <?php require '../controller/assignTicketController/displayDepartments.php' ?>
                        </section>
                    </div>
                </div> 
            </main>

            <main class="w-full md:w-1/2 border border-red-500 p-6 bg-gray-900">
                <h2 class="text-2xl pb-3 font-semibold">
                    Create Ticket
                </h2>
                <div>
                    <!-- 3.input subject -->
                    <div class="flex flex-col mb-3">
                        <label for="message">Subject</label>
                        <textarea name="subject" rows="4" id="message" class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-red-500 focus:outline-none focus:bg-gray-800 focus:text-red-500"></textarea>
                    </div>
                    <div class="flex flex-col mb-3">
                        Status
                        <!-- 4.input status -->
                        <select name="status" id="exampleSelect" class="flex flex-col mb-3">
                            <option value="todo">todo</option>
                            <option value="done">done</option>
                            <option value="doing">doing</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-3">
                        Priority
                        <!-- 5.input priority -->
                        <select name="priority" id="exampleSelect" class="flex flex-col mb-3">
                            <option value="very-important">very-important</option>
                            <option value="important">important</option>
                            <option value="low">low</option>
                        </select>
                    </div>
                </div>
                <div class="w-full pt-3">
                    <button type="submit" class="w-full bg-gray-900 border border-red-500 px-4 py-2 transition duration-50 focus:outline-none font-semibold hover:bg-red-500 hover:text-white text-xl cursor-pointer">
                        Submit
                    </button>
                </div>
            </main>
        </form>
    </section>
    <!-- tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- scripts -->
    <script src="scripts/assignTicket.js"></script>
</body>
</html>