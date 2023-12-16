<?php
class DepartmentsDB {
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

    public function displayDepartments($departmentId) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM departements WHERE id = :id");
            $stmt->bindParam(':id', $departmentId, PDO::PARAM_INT);

            // Execute the statement
            $stmt->execute();

            // Fetch all rows as an associative array
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            die('Display failed: ' . $e->getMessage());
        }
    }
}

// Example usage:
$departments_database = new DepartmentsDB('localhost', 'your_db_name', 'your_username', 'your_password');

// // Display all departments
// $allDepartments = $departments_database->displayDepartments(1);
// print_r($allDepartments);

// // Display a specific department by ID (replace 1 with the actual ID)
// $specificDepartment = $departments_database->displayDepartments(1);
// print_r($specificDepartment);

?>
