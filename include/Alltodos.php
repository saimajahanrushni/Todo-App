<?php
session_start();
include '../Database/env.php';
$query = "SELECT * FROM todos";
$res = mysqli_query($conn,$query);
$posts = mysqli_fetch_all($res,1);
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
<div class="card-header">All todos</div>
<div class=" card body">
<table class = "table table-responsive">
   <tr>
    <th>#</th>
    <th>Title</th>
    <th>Detail</th>
    <th></th>
   </tr>


    <?php
        foreach($posts as $key=>$post){
            ?>
            <tr>
            <td><?= ++$key?></td>
            <td><?=$post['title'] ?></td>
            <td><?=empty($post['detail']) ? '----': (
                strlen($post['detail'])>25 ? substr($post['detail'],0,24).'<a href="#" class="nav-link">Read More</a>':$post['detail']) ?></td>
               
            <td>
                <div class="btn-group">
                    <a href="./Edit-todo.php ? id=<?=$post['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="../Controller/TodoDeleteController.php ? id=<?=$post['id']?>" class="btn btn-danger btn-sm">Delete</a>

                </div>
            </td>
        </tr>
<?php
        }

    ?>

</table>
</div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php session_unset()?>