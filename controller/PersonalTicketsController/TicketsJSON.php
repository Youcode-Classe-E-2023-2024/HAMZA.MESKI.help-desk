<?php
    require_once '../../model/TicketsDB.php';
    $tickets = $tickets_database->displayTicketsAsJSON();
    $json_tickets = json_encode($tickets);
    print $json_tickets;
?>