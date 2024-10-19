<?php
     include 'database.php';
     session_start();
     $select = mysqli_query($conn,"SELECT * FROM tbl_users WHERE username = '$_SESSION[username]' AND password = '$_SESSION[password]'");
     $count = mysqli_num_rows($select);
     
     if($count==0){
          header("location:../index?error");
     }