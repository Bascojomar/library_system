<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

		
			$sql = "SELECT * FROM tbl_users WHERE BINARY username='$username' AND BINARY password='$password'";
			$result = $conn->query($sql);
		
			if ($result->num_rows == 1) {
				$row = $result->fetch_assoc();
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['role'] = trim($row['role']);  // Trim any leading or trailing spaces

			
				if ($_SESSION['role'] === 'admin') {
                    header("location:admin/dashboard");
				}
				elseif ($_SESSION['role'] === 'user') {
                    header("location:user/dashboard");
				}
            }else {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
					echo '<script>
					       alert ("invalid");
      					</script>';
            }
}
?>