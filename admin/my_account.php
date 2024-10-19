<?php
include "../backend/database.php";

$query = "SELECT * FROM tbl_users WHERE role='admin'";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {

    $user = $row['username'];
    $id = $row['role'];
    $email = $row['email'];
    $role = $row['role'];

}
echo '<div class="container d-flex justify-content-center align-items-center center-container mt-5">
<div class="p-4 border rounded w-50 h-50 mt-5">

<h2 class="my-3">Information</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="' . $id . '">
        Name : <input type="text" class="form-control my-2" value="'.$user.'" name="user" required>
        Email :<input type="text" class="form-control my-2" value="'.$email.'" name="email" required>
        Role :<input type="text"  class="form-control my-2" value="'.$role.'" name="role" required>
        <input type="submit" value="Save" name="save_info" class="btn btn-primary form-control" required>
    </form>
</div>
</div>';
?>

