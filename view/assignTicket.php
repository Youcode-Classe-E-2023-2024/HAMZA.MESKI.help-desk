<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ticket</title>
    <!-- Add Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <section id="contact" class="relative w-full min-h-screen text-gray-800">
        <nav class="h-20 bg-pink-500 flex justify-between px-2">
            <div></div>
            <div class="profileButton flex items-center gap-2 cursor-pointer">
                <strong>Ms+</strong>
                <div class="h-12 w-12 rounded-full bg-black" style="background-image: url('../images/jordan.png'); background-size: cover;"></div>
            </div>
        </nav>
        <a href="home.php" >
            Back
        </a>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white h-32 w-full"></div>

        <form id="assignForm" class="relative p-5 lg:px-20 flex flex-col md:flex-row items-center justify-center space-y-6">
            <main class="flex justify-between w-full space-x-0 md:space-x-6">
                <div class="w-full md:w-1/2 mx-0 md:mx-5">
                    <div class="bg-white border border-gray-300 p-5">
                        <h3 class="text-2xl font-semibold mb-5">
                            Select Users
                        </h3>
                        <input type="text" id="searchUsers" placeholder="Search users" class="mb-2 p-2 border border-gray-300 rounded">
                        <section id="userList" class="h-40 overflow-auto">
                            <?php require '../controller/assignTicketController/displayUsers.php' ?>
                        </section>
                    </div>
                </div>

                <div class="w-full md:w-1/2 mx-0 md:mx-5">
                    <div class="bg-white border border-gray-300 p-5">
                        <h3 class="text-2xl font-semibold mb-5">
                            Select Departments
                        </h3>
                        <input type="text" id="searchDepartments" placeholder="Search departments" class="mb-2 p-2 border border-gray-300 rounded">
                        <section id="departmentList" class="h-40 overflow-auto">
                            <?php require '../controller/assignTicketController/displayDepartments.php' ?>
                        </section>
                    </div>
                </div>
            </main>

            <main class="w-full md:w-1/2 border border-gray-300 p-6 bg-white">
                <h2 class="text-2xl pb-3 font-semibold">
                    Create Ticket
                </h2>
                <div>
                    <div class="flex flex-col mb-3">
                        <label for="message">Subject</label>
                        <textarea name="subject" rows="4" id="message" class="px-3 py-2 bg-gray-100 border border-gray-300 focus:border-blue-500 focus:outline-none focus:bg-white focus:text-gray-800" required></textarea>
                    </div>
                    <div class="flex flex-col mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="mb-2 p-2 border border-gray-300 rounded">
                            <option value="todo">todo</option>
                            <option value="done">done</option>
                            <option value="doing">doing</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-3">
                        <label for="priority">Priority</label>
                        <select name="priority" id="priority" class="mb-2 p-2 border border-gray-300 rounded">
                            <option value="very-important">very-important</option>
                            <option value="important">important</option>
                            <option value="low">low</option>
                        </select>
                    </div>
                </div>
                <div class="w-full pt-3">
                    <button type="submit" class="w-full bg-gray-900 border border-blue-500 px-4 py-2 transition duration-300 focus:outline-none font-semibold hover:bg-blue-500 hover:text-white text-xl cursor-pointer rounded">
                        Submit
                    </button>
                </div>
            </main>
        </form>
    </section>

    <!-- Remove tailwind CDN and add your scripts -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="scripts/assignTicket.js"></script>
    <script src="scripts/search.js"></script>
</body>

</html>