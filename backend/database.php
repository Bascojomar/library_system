<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn =  mysqli_connect($servername, $username, $password, $dbname);

    if(mysqli_connect_error()){
        echo "failed";
    }
?>