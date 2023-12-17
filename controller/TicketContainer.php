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
                <form action="ticketSection.php" method="post" class="bg-white shadow-md  rounded-lg h-[296px] cursor-pointer text-left">
                    <input type="hidden" name="ticketId" value="$ticket->id">
                    <input type="hidden" name="ticketSubject" value="$ticket->subject">
                    <input type="hidden" name="department" value="$department->departement">
                    <input type="hidden" name="department_id" value="$department->id">
                    <input type="hidden" name="ticketStatus" value="$ticket->status">
                    <input type="hidden" name="createdBy" value="$ticket->created_by">
                    <input type="hidden" name="createdAssignedTo" value="$ticket->assigned_to">
                    <button type="submit" class="text-left p-6 w-full h-full">
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
                </form>
            HEREDOC;
        }
    }
    $ticketDisplay = new TicketContainer($tickets_database, $departments_database);
    $ticketDisplay->displayTickets();
?>