<?php
require_once 'Traits/ErrorHandling.php';
//  DataBase class to connect to my data
class DataBase {
    use ErrorHandling;
    private $servername;
    private $username; // Use your MySQL username
    private $password; // Use your MySQL password
    public $conn;     // Database connection

    public function __construct($servername, $username = "root", $password = "") {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect_to_database_server() {
        try {
            // Create a connection to the MySQL server
            $this->conn = new PDO("mysql:host={$this->servername}", $this->username, $this->password);
            // Set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $this->conn;
        } catch (PDOException $e) {
            $this->show_error($e->getMessage());
        }
        
    }
    public function getConnection(){
        return $this->conn;
    }


    public function connect_to_my_database($db_name) {
        
        $sql = "USE $db_name";
        // Execute the statement directly
        $this->conn->exec($sql);
    }


    public function execute($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        if ($params!=[]){
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
        }
            $stmt->execute();
            return $stmt;
    }
    public function execute_query($sql) {
        return  $this->conn->query($sql);
            
    }
      

    // جلب النتائج
    public function fetch($sql, $params = []) {
        $stmt = $this->execute($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // جلب جميع النتائج
    public function fetchAll($sql, $params = []) {
        $stmt = $this->execute($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}




?>
