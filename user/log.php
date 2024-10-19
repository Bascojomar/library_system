<?php

$role = $_SESSION['role'];


if ($position == 'admin' ){
  header('location: ../admin/dashboard');
}
?>