<?php
    session_start();
    require_once '../../model/CommentsDB.php';
    require_once '../../model/UsersDB.php';

    $commenter_id = filter_input(INPUT_POST, 'commenter_id', FILTER_SANITIZE_SPECIAL_CHARS);
    $ticket_id = filter_input(INPUT_POST, 'ticket_id', FILTER_SANITIZE_SPECIAL_CHARS);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
    if($comment && $ticket_id && $comment) {
        print_r($_POST); 
        print $commenter_id . '<br>';
        print $ticket_id. '<br>';
        print $comment . '<br>';
        $comments_database->insertComment($commenter_id, $ticket_id, $comment);
    }

    class DisplayComments {
        private $comments;
        private $users;
        private $currentUserId;
        private $currentTicketId;
    
        public function __construct($comments, $users, $currentUserId, $currentTicketId)
        {
            $this->comments = $comments;
            $this->users = $users;
            $this->currentUserId = $currentUserId;
            $this->currentTicketId = $currentTicketId;
        }

        public function renderHTML() {
            $html = '';
            foreach ($this->comments as $comment) {
                foreach($this->users as $user) {
                    if($comment->commenter_id == $user->id) {
                        if($comment->commenter_id == $this->currentUserId && $comment->ticket_id == $this->currentTicketId) {
                            $html .= <<<NOWDOC
                                <main class="p-6 text-base bg-white rounded-lg dark:bg-gray-900 m-1">
                                    <footer class="flex justify-between items-center mb-2">
                                        <div class="flex items-center">
                                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                            <img class="mr-2 w-6 h-6 rounded-full" src="../images/$user->avatar" alt="testing">
                                            $user->username
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                                title="February 8th, 2022">Feb. 8, 2022</time>
                                        </p>
                                        </div>
                                        
                                        <button key="$comment->id" class="comment_setting text-white" type="button">
                                            <ion-icon class="text-xl" name="ellipsis-vertical-outline"></ion-icon>
                                        </button>
                                    </footer>
                                    <p class="text-gray-500 dark:text-gray-400">
                                    $comment->comment
                                    </p>
                                </main>
                            NOWDOC;
                        }elseif ($comment->ticket_id == $this->currentTicketId) {
                            $html .= <<<NOWDOC
                            <main class="p-6 text-base bg-white rounded-lg dark:bg-gray-900 m-1">
                                <footer class="flex justify-between items-center mb-2">
                                    <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                        <img class="mr-2 w-6 h-6 rounded-full" src="../images/$user->avatar" alt="testing">
                                        $user->username
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                            title="February 8th, 2022">Feb. 8, 2022</time>
                                    </p>
                                    </div>
                                </footer>
                                <p class="text-gray-500 dark:text-gray-400">
                                    $comment->comment
                                </p>
                            </main>
                            NOWDOC;
                        }
                    }
                }
            }
            return $html;
        }
    }
    $displayComments = new DisplayComments($comments_database->displayComments(), $users_database->displayUsers(), $_SESSION['user-id'], $_SESSION['current_ticket']);
    print $displayComments->renderHTML();
?>