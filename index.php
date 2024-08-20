<?php
require_once "confige.php";
try {

    header("Location: list_posts.php");
    exit();

} catch (PDOException $e) {
    echo "An error occurred: " . $e->getMessage();
}
