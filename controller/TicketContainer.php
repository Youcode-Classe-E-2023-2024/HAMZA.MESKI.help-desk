<?php

require_once '../model/TicketsDB.php';
require_once '../model/UsersDB.php';

class TicketRenderer
{
    private $ticketsDB;
    private $usersDB;

    public function __construct(TicketsDB $ticketsDB, UsersDB $usersDB)
    {
        $this->ticketsDB = $ticketsDB;
        $this->usersDB = $usersDB;
    }

    public function renderTickets()
    {
        $tickets = $this->ticketsDB->displayTickets();
        $html = '';

        $subjectData = [];

        foreach ($tickets as $ticket) {
            $subject = preg_replace('/\d+/', '', $ticket->subject);

            if (!isset($subjectData[$subject])) {
                $subjectData[$subject] = [
                    'ticket_id' => $ticket->id,
                    'created_by' => $ticket->created_by,
                    'assigned_to' => [$this->usersDB->displayUserById($ticket->assigned_to)->username],
                    'subject' => $subject,
                    'department' => $ticket->department,
                    'status' => $ticket->status,
                    'priority' => $ticket->priority,
                ];
            } else {
                $subjectData[$subject]['assigned_to'][] =  $this->usersDB->displayUserById($ticket->assigned_to)->username;
                // $subjectData[$subject]['department'][] = $ticket->department;
            }
        }

        foreach ($subjectData as $subject => $data) {
            $sum_assigned_to = implode(' - ', $data['assigned_to']);
            $data['assigned_to'] = $sum_assigned_to;

            $createdBy = $this->usersDB->displayUserById($data['created_by'])->username;
            $department = str_replace('&', ' - ', $data['department']);
            $department[strlen($department) - 2] = ' ';

            $assignedTo = 1;

            $html .= <<<HEREDOC
                <form action="ticketSection.php" method="post" class="TICKET bg-white shadow-md rounded-lg h-[296px] cursor-pointer text-left">
                    <input type="hidden" name="ticketId" value="{$data['ticket_id']}">
                    <input type="hidden" name="ticketSubject" value="{$data['subject']}">
                    <input type="hidden" name="department" value="$department">
                    <input type="hidden" name="ticketStatus" value="{$data['status']}">
                    <input type="hidden" name="createdBy" value="$createdBy">
                    <input type="hidden" name="assignedTo" value="$assignedTo">
                    <input type="hidden" name="createdAssignedTo" value="{$data['assigned_to']}">
                    <button type="submit" class="text-left p-6 w-full h-full">
                        <div class="mb-4">
                            <strong class="text-gray-700">Ticket ID:</strong> {$data['ticket_id']}
                        </div>
                        <div class="mb-4">
                            <strong class="text-gray-700">Subject:</strong> {$data['subject']}
                        </div>
                        <div class="mb-4">
                            <strong class="text-gray-700">Department:</strong> $department
                        </div>
                        <div class="mb-4">
                            <strong class="text-gray-700">Status:</strong> {$data['status']}
                        </div>
                        <div class="mb-4">
                            <strong class="text-gray-700" CREATED_BY="{$data['created_by']}">Created by: </strong>$createdBy
                        </div>
                        <div ASSIGNED_TO="{$data['assigned_to']}"></div>
                        <div>
                            <strong class="text-gray-700">Priority:</strong> {$data['priority']}
                        </div>
                    </button>
                </form>
            HEREDOC;
        }

        print $html;
    }
}

$ticketRenderer = new TicketRenderer($tickets_database, $users_database);
$ticketRenderer->renderTickets();
?>
