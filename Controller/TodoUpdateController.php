<?php
session_start();

$title = $_REQUEST['title'];
$detail=$_REQUEST['detail'];
$id=$_REQUEST['id'];
$errors=[];
//* VALIDATION
if( empty($title)) {
    $errors['title_error'] = "title is required";
}
if( empty($detail)) {
      $errors['detail_error'] = "detail is required";
}
//* REDIRECTION && ERROR SAVE
if(count($errors)>0){
    //* ERROR OCCUR
    $_SESSION['errors']=$errors;
    $_SESSION['old_data']= $_REQUEST;
    header("Location: ../include/Edit-todo.php ? id= $id"); //*REDIRECT
} 
    //* NO ERROR OCCUR
    else{
        include '../Database/env.php';
        $query= "UPDATE todos SET title='$title', detail ='$detail' WHERE id ='$id'";
        $res = mysqli_query($conn,$query);

        if($res){
            header("Location: ../include/Alltodos.php");
        }
}
?>