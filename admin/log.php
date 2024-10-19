<?php
$role = $_SESSION['role'];
if ($role == 'user' ){
  header('location: ../user/dashboard');
}
?>