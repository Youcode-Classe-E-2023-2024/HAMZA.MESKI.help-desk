<?php 
    require_once '../model/TicketsDB.php';
    $ticket_id = $_POST['ticket_id'];
    $status = $_POST['status'];
    $tickets_database->updateTicketStatus($ticket_id, $status);
?>