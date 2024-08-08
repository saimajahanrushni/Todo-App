<?php
session_start();
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
<div class="card-header"> Add Todo</div>
<div class=" card body">
<form method="POST"action="../Controller/StoretodoController.php">
        <input value="<?= $_SESSION['old_data']['title'] ?? null ?>" name="title" type="text" class="form-control my-2" placeholder="todo title ">
         <p class="text-danger">
          <?= $_SESSION['errors']['title_error'] ?? null?>
</p>
        <textarea name="detail"class="form-control my-2"placeholder="todo detail"><?= $_SESSION['old_data']['detail'] ?? null ?></textarea>
        <p class="text-danger">
          <?= $_SESSION['errors']['detail_error'] ?? null?>
</p>
        <button class="btn btn-primary rounded-0 ">Add Todo</button>
    </form>
</div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php session_unset()?>