<?php
session_start();

include "../Database/env.php";
$id= $_REQUEST['id'];
$query="SELECT * FROM todos WHERE id='$id' ";
$res = mysqli_query($conn,$query);
$post = mysqli_fetch_assoc($res);
if($post == null){
    header("Location: ../include/404.php");
    exit();

}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Todo App</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
<?php
include '../include/Navbar.php';
?>

<div class="col-lg-4 mx-auto">
<div class="card">
<div class="card-header">Edit Todo</div>
<div class=" card body">
<form method="POST"  action="../Controller/TodoUpdateController.php">

     <input type="hidden" name="id" value ="<?= $post['id'] ?? null ?>">
        <input name ="title" type="text" placeholder="todo title" class="form-control" value="<?= $post['title'] ?? null ?>" > 
         <span class="text-danger">
          <?= $_SESSION['errors']['title_error'] ?? null?></span>
        <textarea name="detail"class="form-control my-2" placeholder="todo detail ">
            <?= $_SESSION['old_data']['detail'] ?? null ?><?= $post['detail'] ??null ?></textarea>
        <p class="text-danger">
          <?= $_SESSION['errors']['detail_error'] ?? null?>
</p>
        <button class="btn btn-primary rounded-0 ">Update Todo</button>
    </form>
</div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php session_unset()?>