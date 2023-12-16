<?php 
class UsersDB {
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

    public function insertUser($firstname, $lastname, $username, $email, $password, $avatar) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO users (firstname, lastname, username, email, password, avatar) VALUES (:firstname, :lastname, :username, :email, :password, :avatar)");
    
            $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
    
            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            die('Insert failed: ' . $e->getMessage());
        }
    }

    public function displayUsersByUsernameOrEmail($username, $email) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
    
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    
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
// tables
$users_database = new UsersDB('localhost', 'desk', 'root', '');

// // Example usage:
// $database = new UsersDB('localhost', 'desk', 'root', '');

// // Insert user
// $database->insertUser('John', 'Doe', 'john_doe', 'john@example.com', 'hashed_password', 'avatar.jpg', 1);

// // Display users
// $users = $database->displayUsersByUsernameOrEmail('john_doe', 'john@example.com');
// print_r($users);

// // Update user
// $database->updateUser(1, 'Updated', 'User', 'updated_user', 'updated@example.com', 'updated_password', 'updated_avatar.jpg', 2);

// // Delete user
// $database->deleteUser(1);
?>
