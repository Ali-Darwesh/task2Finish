<?php
require_once "confige.php";


// التحقق من أن الطلب تم باستخدام POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // جلب البيانات من النموذج
        $post->title = $_POST['title'];
        $post->content = $_POST['content'];
        $post->author = $_POST['author'];
        
    $formData = [
        'title' => $_POST['title'] ?? '',
        'content' => $_POST['content'] ?? '',
        'author' => $_POST['author'] ?? ''
    ];
    
    // Define required fields
    $requiredFields = ['title', 'content', 'author'];
    
    // Validate the required fields
    $validator->validateRequiredFields($formData, $requiredFields);
    
    // Check if the validation passed
    if ($validator->isValid()) {
        echo "All fields are filled.";
        try {
             // إدخال المقالة الجديدة في قاعدة البيانات
            $post->create();
            header("Location:list_posts.php");
                exit();
        } catch (Exception $e) {
            echo "حدث خطأ أثناء إنشاء المقالة: " . $e->getMessage();
        }
    } else {
        // Output errors
        $errors = $validator->getErrors();

    }

   
    
} else {
    echo "يرجى إرسال البيانات عبر النموذج.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <div class="container-lg mt-5">
        <!-- Title -->
        <h1 class="mb-4">Create a New Post</h1>
        
        <!-- Form -->
        <form method="POST">
            <!-- Title Error -->
            <?php if (!empty($errors['title'])): ?>
                <?php $post->showError($errors['title']);?>
                <?php endif; ?>
                
                <!-- Title Input -->
                <input class="form-control form-control-lg mb-3" type="text" id="title" name="title"  placeholder="Title" aria-label="default input example">
                
                <!-- Content Error -->
                <?php if (!empty($errors['content'])): ?>
                    <?php $post->showError($errors['content']);?>
                <?php endif; ?>
                
            <!-- Content Textarea -->
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>

            <!-- Author Error -->
            <?php if (!empty($errors['author'])): ?>
                <?php $post->showError($errors['author']);?>
            <?php endif; ?>


            <!-- Author Input -->
            <input class="form-control form-control-lg mb-3" type="text" id="author" name="author"  placeholder="Author" aria-label="default input example">

            <!-- Submit Button with Margin -->
            <div class="d-flex justify-content-start mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Create</button>
            </div>
        </form>
    </div>
</body>
</html>
