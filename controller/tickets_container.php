<?php
    require_once '../model/TicketsDB.php';
    require_once '../model/DepartementsDB.php';

    $tickets = $ticket_database->displayTickets();
    $departements = $departments_database->displayDepartments();

    $html = '';
    foreach($tickets as $ticket) {
        foreach($departements as $departement) {
            if($ticket->departement_id == $departement->id) {
                $html .=<<<HEREDOC
                <button class="bg-white shadow-md p-6 rounded-lg h-[296px] cursor-pointer text-left">
                    <div class="mb-4">
                        <strong class="text-gray-700">Ticket ID:</strong> $ticket->id
                    </div>
                    <div class="mb-4">
                        <strong class="text-gray-700">Subject:</strong> $ticket->subject
                    </div>
                    <div class="mb-4">
                        <strong class="text-gray-700">Department:</strong> $departement->departement
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
                </button>
                HEREDOC;
                break;
            }
        }
    }
    echo $html;
?>
