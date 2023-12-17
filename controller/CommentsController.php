<?php
    require_once '../model/CommentsDB.php';
    require_once '../model/UsersDB.php';

    $commenter_id = filter_input(INPUT_POST, 'commenter_id', FILTER_SANITIZE_SPECIAL_CHARS);
    $ticket_id = filter_input(INPUT_POST, 'ticket_id', FILTER_SANITIZE_SPECIAL_CHARS);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
    $comments_database->insertComment($commenter_id, $ticket_id, $comment);
    
    $comments = $comments_database->displayComments();
    $users = $users_database->displayUsers();
    
    $html = '';
    foreach ($comments as $comment) {
        foreach($users as $user) {
            if($comment->commenter_id == $user->id) {
                // print "{$comment[2]} == $logger_id && {$comment[3]} == {$_SESSION['current_article']} && {$_POST['oneTwo']} == 1 <br>";
                if($comment->commenter_id == $_SESSION['user-id'] && $comment->ticket_id == $_POST['department_id']) {
                    $html .= <<<NOWDOC
                        <main class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                    <img class="mr-2 w-6 h-6 rounded-full" src="../images/$user[6]" alt="testing">
                                    $user[1]
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                        title="February 8th, 2022">Feb. 8, 2022</time>
                                </p>
                                </div>
                                
                                <button key="$comment[0]" class="comment_setting text-white" type="button">
                                    <ion-icon class="text-xl" name="ellipsis-vertical-outline"></ion-icon>
                                </button>
                            </footer>
                            <p class="text-gray-500 dark:text-gray-400">
                            $comment[1]
                            </p>
                        </main>
                    NOWDOC;
                }elseif ($comment->ticket_id == $_POST['department_id']) {
                    $html .= <<<NOWDOC
                    <main class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                <img class="mr-2 w-6 h-6 rounded-full" src="../images/$user[6]" alt="testing">
                                $user[1]
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                    title="February 8th, 2022">Feb. 8, 2022</time>
                            </p>
                            </div>
                        </footer>
                        <p class="text-gray-500 dark:text-gray-400">
                            $comment[1]
                        </p>
                    </main>
                    NOWDOC;
                }
            }
        }
    }
    echo $html;
?>