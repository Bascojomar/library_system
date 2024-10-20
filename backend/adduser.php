<?php

include 'database.php';

if(isset($_POST['save'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $strand = $_POST['strand'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tbl_users SET username = '$username', password = '$password', name = '$name', email = '$email', role ='$role', strand = 'strand'";
    $result = mysqli_query($conn, $sql);

    if ($result){

        header("location: ../admin/user");
    }else{
        echo "invaid";
}
}

?>