<?php
    require_once '../model/TicketsDB.php';
    require_once '../model/DepartementsDB.php';

    class TicketContainer
    {
        private $ticketDatabase;
        private $departmentDatabase;
    
        public function __construct(TicketsDB $ticketDatabase, DepartmentsDB $departmentDatabase)
        {
            $this->ticketDatabase = $ticketDatabase;
            $this->departmentDatabase = $departmentDatabase;
        }
    
        public function displayTickets()
        {
            $tickets = $this->ticketDatabase->displayTickets();
            $departments = $this->departmentDatabase->displayDepartments();
    
            $html = '';
            foreach ($tickets as $ticket) {
                foreach ($departments as $department) {
                    if ($ticket->departement_id == $department->id) {
                        $html .= $this->renderTicket($ticket, $department);
                        break;
                    }
                }
            }
    
            echo $html;
        }
    
        private function renderTicket($ticket, $department)
        {
            return <<<HEREDOC
                <button name="ticketId" value="$ticket->id" class="bg-white shadow-md p-6 rounded-lg h-[296px] cursor-pointer text-left">
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
                </button>
            HEREDOC;
        }
    }
    $ticketDisplay = new TicketContainer($tickets_database, $departments_database);
    $ticketDisplay->displayTickets();
?>