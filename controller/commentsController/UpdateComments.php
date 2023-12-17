<?php 
    require_once '../../model/CommentsDB.php';

    $comment_id = filter_input(INPUT_POST, 'commentId', FILTER_SANITIZE_SPECIAL_CHARS);
    $comment = filter_input(INPUT_POST, 'newComment', FILTER_SANITIZE_SPECIAL_CHARS);
    $comments_database->updateCommentText($comment_id, $comment);
?>