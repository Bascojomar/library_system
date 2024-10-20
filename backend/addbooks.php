<?php

include 'database.php';

if(isset($_POST['save'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $category = $_POST['category'];
    $strand = $_POST['strand'];

    $sql = "INSERT INTO tbl_books SET title ='$title', author = '$author', publisher = '$publisher', category = '$category', strand='$strand'";
    $result = mysqli_query($conn, $sql);

    if($result){

        header("location:../admin/dashboard");

    }else {
        echo "invalid";
    }
}


?>