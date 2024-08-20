<?php
require_once "confige.php";

try {
    if (isset($_GET['id'])) {
        $post_id = $_GET['id'];

      $post->delete($post_id);

        header("Location:list_posts.php");
        exit();
    
    }
} catch (Exception $e) {
    echo "حدث خطأ أثناء تعديل المقالة: " . $e->getMessage();
}
?>