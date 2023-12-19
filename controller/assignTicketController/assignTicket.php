<?php
    session_start();
    require_once '../../model/TicketsDB.php';
    print '<pre>'; 
    print_r($_POST); 
    print '<pre>';

    $created_by = $_SESSION['user-id'];
    $selected_users = $_POST['selected_users']; 
    $selected_departments = $_POST['selected_departments']; 
    $subject = $_POST['subject']; 
    $status = $_POST['status']; 
    $priority = $_POST['priority'];

    # concatination of departments into one string
    $sum_departments = '';
    for($i = 0; $i < count($selected_departments); $i++) {
        $sum_departments .= $selected_departments[$i] . '&';
    }

    # each subject is unic using time() function
    $currentTimestamp = time();
    for($i = 0; $i < count($selected_users); $i++) {
        $tickets_database->insertTicket($created_by, $selected_users[$i], $subject . $currentTimestamp, $sum_departments, $status, $priority);
    }
?>
