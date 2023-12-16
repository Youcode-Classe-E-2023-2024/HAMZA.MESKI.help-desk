<?php
    require_once '../model/TicketsDB.php';
    require_once '../model/DepartementsDB.php';
    $tickets = $tickets_database->displayTickets();
    $departments = $departments_database->displayDepartments();
   
    foreach($tickets as $ticket) {
        if($ticket->id == $_POST['ticketId']) {
            foreach($departments as $department) {
                print <<<HEREDOC
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
                HEREDOC;
                break;
            }
        }
    }
?>