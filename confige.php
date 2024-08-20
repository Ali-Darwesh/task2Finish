<?php
require_once "classes/database.php";
require_once "classes/post.php";
require_once "classes/validation.php";
$servername = "localhost";
$username = "root";  // Use your MySQL username
$password = "";      // Use your MySQL password
$db_name="blog_db";
$db = new DataBase($servername,$username,$password);
$conn =$db->connect_to_database_server();
try {
    // Read the SQL file
    $sql = file_get_contents('db.sql');

    // Execute the SQL commands
    $conn->exec($sql);

    $db_name="blog_db";
//    $db->connect_to_my_database($db_name);
      
} catch (PDOException $e) {
   $e->getMessage();
}
$db->connect_to_my_database($db_name);
$post = new Post($db);
// Create a new instance of the Validation class
$validator = new Validation();

?>