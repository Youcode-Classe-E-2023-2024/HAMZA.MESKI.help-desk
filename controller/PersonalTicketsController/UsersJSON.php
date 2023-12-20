<?php
    require_once '../../model/UsersDB.php';
    $users = $users_database->displayUsersAsJSON();
    // print '<pre>';
    // print_r($users);
    // print '</pre>';
    $json_users = json_encode($users);
    print $json_users;
?>
