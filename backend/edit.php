<?php

include 'database.php';

if(isset($_POST['save'])){

    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $category = $_POST['category'];

    $sql = "UPDATE tbl_books SET title ='$title', author = '$author', publisher = '$publisher', category = '$category' WHERE book_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result){

        header("location:../admin/thesis");

    }else{
        echo "error";
    }

}

?>