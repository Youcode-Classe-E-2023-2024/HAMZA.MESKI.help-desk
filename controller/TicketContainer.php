<?php
    require_once '../model/TicketsDB.php';

    class TicketContainer
    {
        private $ticketDatabase;
    
        public function __construct(TicketsDB $ticketDatabase)
        {
            $this->ticketDatabase = $ticketDatabase;
        }
    
        public function displayTickets()
        {
            $tickets = $this->ticketDatabase->displayTickets();
    
            $html = '';
            foreach ($tickets as $ticket) {
                $html .= $this->renderTicket($ticket);
            }
    
            print $html;
        }
    
        private function renderTicket($ticket)
        {
            return <<<HEREDOC
                <form action="ticketSection.php" method="post" class="bg-white shadow-md  rounded-lg h-[296px] cursor-pointer text-left">
                    <input type="hidden" name="ticketId" value="$ticket->id">
                    <input type="hidden" name="ticketSubject" value="$ticket->subject">
                    <input type="hidden" name="department" value="$ticket->department">
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
                            <strong class="text-gray-700">Department:</strong> $ticket->department
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
    $ticketDisplay = new TicketContainer($tickets_database);
    $ticketDisplay->displayTickets();
?>