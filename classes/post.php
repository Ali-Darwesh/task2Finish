<?php
require_once "database.php";
require_once 'Traits/ErrorHandling.php';

class Post{
        use ErrorHandling;

    private $db;

    public $id;
    public $title;
    public $content;
    public $author;
    public $created_at;
    public $updated_at;

    public function __construct($db){
        $this->db=$db;
    }

   //create=====================================================================================
    public function create() {
        $sql = "INSERT INTO posts (title, content, author) VALUES (:title, :content, :author)";
        $params = [
            ':title' => $this->title,
            ':content' => $this->content,
            ':author' => $this->author
        ];
            //execute query
        $this->db->execute($sql, $params);

        // جلب معرف الصف الذي تم إدخاله
        $this->id = $this->db->getConnection()->lastInsertId();
    }
    //Read=====================================================================================
    public function read($id){
        $sql = "SELECT * FROM posts WHERE id = :id";
        $params = [':id' => $id];
        
        // Fetch the post data and return it
        return $this->db->fetch($sql, $params);
    } 
//update========================================================================================
    public function update($id){
        $sql="UPDATE posts
        SET title=:title,content=:content, author=:author
        WHERE id=:id";
        $params = [
            ':title' => $this->title,
            ':content' => $this->content,
            ':author' => $this->author,
            ':id'=>$id
        ];
            //execute query
      return  $this->db->execute($sql, $params);

    }
//listAll================================================================================
    public function listAll(){
        $sql ="SELECT * FROM posts";
        $stmt = $this->db->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
//Delete===================================================================================
    public function delete($id){
        $sql ="DELETE FROM posts WHERE id = :id";
        $params = [':id' => $id];  
        $this->db->execute($sql, $params);
       $this->db->execute_query("SET @count = 0");
       $this->db->execute_query("UPDATE posts SET id = @count:= @count + 1;");
       $this->db->execute_query("ALTER TABLE posts AUTO_INCREMENT = 1");
    }
    public function doSomething() {
        $this->showError('An error occurred.');
    }

    //to use trait
    public function showError($error) {
        $this->show_error($error);
    }

}

?>