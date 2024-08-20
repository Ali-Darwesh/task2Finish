<?php
require_once "confige.php";

try {

    $posts = $post->listAll();

} catch (PDOException $e) {
    echo "An error occurred: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>task2</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

        <h1 class="my-4 ">Posts</h1>
        
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Author</th>
            <th scope="col">CreatedAt</th>
            <th scope="col">UpdatedAt</th>
            <th scope="col">Actions</th>
            
            </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post1): ?>
            <tr>
                <td><?php echo $post1['id']; ?></td>
                <td><?php echo $post1['title']; ?></td>
                <td ><?php echo strlen($post1['content']) > 30 ? substr($post1['content'], 0, 30) . '...' : $post1['content']; ?></td>
                <td><?php echo $post1['author']; ?></td>
                <td><?php echo $post1['created_at']; ?></td>
                <td><?php echo $post1['updated_at']; ?></td>
                <td>
                <a href="view_post.php?id=<?php echo $post1['id']; ?>"> <button type="button" class="btn btn-success">Read</button></a>
                <a href="edit_post.php?id=<?php echo $post1['id']; ?>"> <button type="button" class="btn btn-primary">Edit</button></a>
                <a href="delete_post.php?id=<?php echo $post1['id']; ?>"> <button type="button" class="btn btn-danger">delete</button></a>
                
                </td>
            </tr>
            <?php endforeach; ?>

    </tbody>
    </table>
    <a href="create_post.php"> <button type="button" class=" btn btn-primary ">Create Post</button></a>


    </body>
</html>
