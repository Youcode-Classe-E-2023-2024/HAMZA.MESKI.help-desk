<?php

class TicketsDB {
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

    public function insertTicket($created_by, $assigned_to, $subject, $department_id, $status, $priority) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO tickets (created_by, assigned_to, subject, department_id, status, priority) VALUES (:created_by, :assigned_to, :subject, :department_id, :status, :priority)");

            $stmt->bindParam(':created_by', $created_by, PDO::PARAM_INT);
            $stmt->bindParam(':assigned_to', $assigned_to, PDO::PARAM_INT);
            $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
            $stmt->bindParam(':department_id', $department_id, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':priority', $priority, PDO::PARAM_STR);

            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            die('Insert failed: ' . $e->getMessage());
        }
    }

    public function displayTickets() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM tickets");
    
            // Execute the statement
            $stmt->execute();
    
            // Fetch all rows as an associative array
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
        } catch (PDOException $e) {
            die('Display failed: ' . $e->getMessage());
        }
    }

    public function updateTicket($id, $created_by, $assigned_to, $subject, $department_id, $status, $priority) {
        try {
            $stmt = $this->pdo->prepare("UPDATE tickets SET created_by = :created_by, assigned_to = :assigned_to, subject = :subject, department_id = :department_id, status = :status, priority = :priority WHERE id = :id");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':created_by', $created_by, PDO::PARAM_INT);
            $stmt->bindParam(':assigned_to', $assigned_to, PDO::PARAM_INT);
            $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
            $stmt->bindParam(':department_id', $department_id, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':priority', $priority, PDO::PARAM_STR);

            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            die('Update failed: ' . $e->getMessage());
        }
    }

    public function deleteTicket($id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM tickets WHERE id = :id");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            die('Delete failed: ' . $e->getMessage());
        }
    }
}

$ticket_database = new TicketsDB('localhost', 'desk', 'root', '');

// // Insert ticket
// $ticket_database->insertTicket(1, 2, 'Ticket Example', 3, 'In Progress', 'High');

// // Display tickets
// $tickets = $ticket_database->displayTickets();
// print_r($tickets);

// // Update ticket
// $ticket_database->updateTicket(1, 4, 5, 'Updated Ticket', 6, 'Completed', 'Low');

// // Delete ticket
// $ticket_database->deleteTicket(1);

?>