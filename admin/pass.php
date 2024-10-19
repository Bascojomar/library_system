<?php
include "../backend/database.php";

$query = "SELECT * FROM tbl_users WHERE role='admin'";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {

    $id = $row['user_id'];
    $password = $row['password'];

}
echo '<div class="container d-flex justify-content-center align-items-center center-container mt-5">
<div class="p-4 border rounded w-50 h-50 mt-5">

<h2 class="my-3">Change Password</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="' . $id . '">
        Current Password : <input type="text" class="form-control my-2" placeholder="******" name="current" required>
        New Password : <input type="text" class="form-control my-2" placeholder="******" name="newpass" required>
        Confirmation Password :<input type="text" class="form-control my-2" placeholder="******" name="confirm" required>
        <input type="submit" name="save_pass" class="btn btn-primary form-control">
    </form>
</div>
</div>';
?>

