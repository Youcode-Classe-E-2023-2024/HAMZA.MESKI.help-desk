<?php
    require_once '../model/UsersDB.php';

    $html;
    $users = $users_database->displayUsers();
    foreach($users as $user) {
        if($user->id == $_SESSION['user-id']) {
            $html =<<<HEREDOC
                <div id="profileButton" class="flex items-center gap-2 cursor-pointer">
                    <strong>$user->username</strong>
                    <div class="h-16 w-16 rounded-full bg-black" style="background-image: url('../images/$user->avatar');background-size: cover;"></div>
                </div>
            HEREDOC;
            break;
        }
    }
    echo $html;
?>