<?php
require_once '../model/TicketsDB.php';

$tickets = $tickets_database->displayTickets();

$html = '';

// Use an associative array to store data for each subject
$subjectData = [];

foreach ($tickets as $ticket) {
    $subject = preg_replace('/\d+/', '', $ticket->subject);

    if (!isset($subjectData[$subject])) {
        // Initialize data for this subject if not already set
        $subjectData[$subject] = [
            'ticket_id' => $ticket->id,
            'created_by' => $ticket->created_by,
            'assigned_to' => [$ticket->assigned_to],
            'subject' => $subject,
            'department' => $ticket->department,
            'status' => $ticket->status,
            'priority' => $ticket->priority,
        ];
    } else {
        // Update data for this subject if already set
        $subjectData[$subject]['assigned_to'][] = $ticket->assigned_to;
        // $subjectData[$subject]['department'][] = $ticket->department;
    }
}

// Now, iterate over the $subjectData array to generate HTML
foreach ($subjectData as $subject => $data) {
    // Sum of assigned_to users
    $sum_assigned_to = implode(' ', $data['assigned_to']);
    $data['assigned_to'] = $sum_assigned_to;

    // Sum of department
    // $sum_department = implode(' ', $data['department']);
    // $data['department'] = $sum_department;

    $html .= <<<HEREDOC
        <form action="ticketSection.php" method="post" class="bg-white shadow-md rounded-lg h-[296px] cursor-pointer text-left">
            <input type="hidden" name="ticketId" value="{$data['ticket_id']}">
            <input type="hidden" name="ticketSubject" value="{$data['subject']}">
            <input type="hidden" name="department" value="{$data['department']}">
            <input type="hidden" name="ticketStatus" value="{$data['status']}">
            <input type="hidden" name="createdBy" value="{$data['created_by']}">
            <input type="hidden" name="createdAssignedTo" value="{$data['assigned_to']}">
            <button type="submit" class="text-left p-6 w-full h-full">
                <div class="mb-4">
                    <strong class="text-gray-700">Ticket ID:</strong> {$data['ticket_id']}
                </div>
                <div class="mb-4">
                    <strong class="text-gray-700">Subject:</strong> {$data['subject']}
                </div>
                <div class="mb-4">
                    <strong class="text-gray-700">Department:</strong> {$data['department']}
                </div>
                <div class="mb-4">
                    <strong class="text-gray-700">Status:</strong> {$data['status']}
                </div>
                <div class="mb-4">
                    <strong class="text-gray-700">Created by:</strong> {$data['created_by']}
                </div>
                <div>
                    <strong class="text-gray-700">Assigned to:</strong> {$data['assigned_to']}
                </div>
            </button>
        </form>
    HEREDOC;
}

print $html;
?>
