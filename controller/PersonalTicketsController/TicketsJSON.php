<?php
    require_once '../../model/TicketsDB.php';
    $userId = (int)$_POST['userId'];
    $tickets = $tickets_database->displayTicketsAsJSON($userId);
    // print_r($tickets);
    if(count($tickets) == 1) {
        $tickets = [$tickets];
        print 'True<br>';
    }
    $json_tickets = json_encode($tickets);
    // if(!str_contains($json_tickets, '[')) {
    //     $json_tickets = '[' . $json_tickets . ']';
    // }
    print $json_tickets;
?>