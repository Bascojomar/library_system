<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library_system";

    $conn =  mysqli_connect($servername, $username, $password, $dbname);

    if(mysqli_connect_error()){
        echo "failed";
    }
?>