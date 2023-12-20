<?php
    require_once '../../model/TicketsDB.php';
    $userId = (int)$_POST['userId'];
    $tickets = $tickets_database->displayTicketsAsJSON($userId);
    $json_tickets = json_encode($tickets);
    print $json_tickets;
?>