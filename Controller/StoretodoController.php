<?php
session_start();

$title = $_REQUEST['title'];
$detail=$_REQUEST['detail'];
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
    header("Location: ../include/Index1.php"); //*REDIRECT
} 
    //* NO ERROR OCCUR
    else{
        include '../Database/env.php';
        $query ="INSERT INTO todos(title, detail) VALUES ('$title','$detail')";
       $store = mysqli_query($conn, $query);
        if($store){
           header("Location: ../include/Index1.php");
        }
}
?>