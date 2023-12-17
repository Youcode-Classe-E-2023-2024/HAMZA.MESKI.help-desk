<?php
    require_once '../model/TicketsDB.php';
    require_once '../model/DepartementsDB.php';
    $tickets = $tickets_database->displayTickets();
    $departments = $departments_database->displayDepartments();

    print <<<HEREDOC
    <article name="ticketId" value="{$_POST['ticketId']}" class="w-[80%] bg-white shadow-md p-6 rounded-lg h-[296px] cursor-pointer text-left">
        <div class="mb-4">
            <strong class="text-gray-700">Ticket ID:</strong> {$_POST['ticketId']}
        </div>
        <div class="mb-4">
            <strong class="text-gray-700">Subject:</strong> {$_POST['ticketSubject']}
        </div>
        <div class="mb-4">
            <strong class="text-gray-700">Department:</strong> {$_POST['department']}
        </div>
        <div class="mb-4">
            <strong class="text-gray-700">Status:</strong> {$_POST['ticketStatus']}
        </div>
        <div class="mb-4">
            <strong class="text-gray-700">Created by:</strong> {$_POST['createdBy']}
        </div>
        <div>
            <strong class="text-gray-700">Assigned to:</strong> {$_POST['createdAssignedTo']}
        </div>
    </article>
    HEREDOC;
?>