<?php 
    require_once '../model/UsersDB.php';
    $users = $users_database->displayUsers();

    foreach ($users as $user) {
        echo '<label>';
        echo '<input type="checkbox" name="selected_users[]" value="' . $user->username . '">';
        echo $user->username . '<br>';
        echo '</label>';
    }
?>
