<?php
    // print $_POST['userId'];
    require_once '../../model/TicketsDB.php';
    $userId = (int)$_POST['userId'];
    $tickets = $tickets_database->displayTicketsAsJSON2($userId);
    $json_tickets = json_encode($tickets);
    print $json_tickets;
?>