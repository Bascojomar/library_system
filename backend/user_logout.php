<?php 
include 'database.php';
include "session.php";
session_destroy();
header("location:../../index");
 ?>