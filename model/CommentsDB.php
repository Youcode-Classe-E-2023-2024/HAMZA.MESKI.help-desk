<?php

class CommentsDB {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;

    public function __construct($host, $dbname, $username, $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

        $this->connect();
    }

    private function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public function insertComment($commenter_id, $ticket_id, $comment) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO comments (commenter_id, ticket_id, comment) VALUES (:commenter_id, :ticket_id, :comment)");

            $stmt->bindParam(':commenter_id', $commenter_id, PDO::PARAM_INT);
            $stmt->bindParam(':ticket_id', $ticket_id, PDO::PARAM_INT);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);

            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            die('Insert failed: ' . $e->getMessage());
        }
    }

    public function displayCommentsByTicket($ticket_id) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE ticket_id = :ticket_id");
    
            $stmt->bindParam(':ticket_id', $ticket_id, PDO::PARAM_INT);
    
            // Execute the statement
            $stmt->execute();
    
            // Fetch all rows as an associative array
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
        } catch (PDOException $e) {
            die('Display failed: ' . $e->getMessage());
        }
    }

    public function updateCommentText($id, $comment) {
        try {
            $stmt = $this->pdo->prepare("UPDATE comments SET comment = :comment WHERE id = :id");
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    
            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            die('Update failed: ' . $e->getMessage());
        }
    }
    
    public function deleteComment($id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id = :id");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            die('Delete failed: ' . $e->getMessage());
        }
    }
}

// Example usage:
$comments_database = new CommentsDB('localhost', 'desk', 'root', '');

// // Insert comment
// $comments_database->insertComment(1, 2, 'This is a comment on the ticket.');

// // Display comments for a ticket
// $comments = $comments_database->displayCommentsByTicket(2);
// print_r($comments);

// // Update the comment text for the comment with ID 1
// $comments_database->updateCommentText(1, 'Updated comment text');

// // Delete comment
// $comments_database->deleteComment(1);

?>
