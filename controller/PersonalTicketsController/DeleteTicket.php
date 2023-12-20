<?php
    require_once '../../model/TicketsDB.php';
    $userId = (int)$_POST['id_user'];
    $tickets_database->deleteTicket($userId);
?>