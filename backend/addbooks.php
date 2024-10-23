<?php

include 'database.php';

if(isset($_POST['book'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $category = $_POST['category'];
    $strand = $_POST['strand'];

    $sql = "INSERT INTO tbl_books SET title ='$title', author = '$author', publisher = '$publisher', category = '$category', strand_id ='$strand'";
    $result = mysqli_query($conn, $sql);

    if($result){

        header("location:../admin/dashboard");

    }else {
        echo "invalid";
    }
}
if (isset($_POST['books'])) {
    // Get form data
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $category = $_POST['category'];
    $strand = $_POST['strand'];

    // Handle file upload
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $pdf = basename($_FILES["file"]["name"]);
        $uploadDir = '../books/';
        $uploadFilePath = $uploadDir . basename($_FILES["file"]["name"]);
            $uploadFileTemp = $_FILES["file"]["tmp_name"];

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($uploadFileTemp, $uploadFilePath)) { 
            $sql = "INSERT INTO tbl_books (title, author, publisher, category, strand_id, file) VALUES ('$title', '$author', '$publisher', '$category', '$strand', '$uploadFilePath')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: ../user/books");
                exit; // Always good to exit after a header redirect
            } else {
                echo "Invalid query: " . mysqli_error($conn);
            }
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "No file uploaded or an error occurred during upload. Error code: " . $_FILES["file"]["error"];
    }
}



if(isset($_POST['update'])){

$book = $_POST['action'];
$id = $_POST['book_id'];

$sql = "UPDATE tbl_books SET status = '$book' where book_id = '$id'";
$result = mysqli_query($conn, $sql);

if($result){

    header("location: ../user/books");

}

}


?>