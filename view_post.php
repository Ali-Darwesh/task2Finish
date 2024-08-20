<?php
require_once "confige.php";

try {
    if (isset($_GET['id'])) {
        $post_id = $_GET['id'];
       $posts= $post->read($post_id);
       
    } else {
        echo "لم يتم العثور على المقالة بهذا المعرف.";
    }      
    
} catch (Exception $e) {
    echo "حدث خطأ أثناء تعديل المقالة: " . $e->getMessage();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .content-border {
            border: 2px solid #ddd; /* Thicker border */
            padding: 20px;          /* More padding */
            border-radius: 10px;   /* Rounded corners */
            background-color: #f9f9f9;
            font-size: 1.2rem;      /* Larger font size */
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <div class="container mt-5">
        <div class="row">
            <!-- Title and Author Section -->
            <div class=" d-flex flex-column justify-content-center col-md-8 mx-auto text-center">
                <h1 class="fs-2"><?php echo$posts['title']; ?></h1>
                <p class="fs-4">by <span> <?php echo $posts['author']; ?></span></p>
            </div>
        </div>
        <div class="row">
            <!-- Content Section -->
            <div class="col-md-8 mx-auto">
                <div class="content-border">
                    <h2 class="mt-4">Content</h2>
                    <p><?php echo nl2br(htmlspecialchars($posts['content'])); ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


