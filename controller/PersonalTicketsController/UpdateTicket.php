<?php
    session_start();
    require_once '../../model/TicketsDB.php';
    print '<pre>'; 
    print_r($_POST); 
    print '<pre>'; 

    $ticket_id  = $_POST['ticket_id'];
    $selected_departments = $_POST['selected_departments'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];


    # concatination of departments into one string
    $sum_departments = '';
    for($i = 0; $i < count($selected_departments); $i++) {
        $sum_departments .= $selected_departments[$i] . '&';
    }

    # each subject is unic using time() function
    $currentTimestamp = time();
    $tickets_database->updateTicketById($ticket_id, $sum_departments, $status, $priority);
?>