
<?php
include "database.php";
session_start();

if (isset($_POST['admin-login'])) {
    $username = $_POST['username'];
			$password = $_POST['password'];
		
			$sql = "SELECT * FROM tbl_users WHERE BINARY username='$username' AND BINARY password='$password'";
			$result = $conn->query($sql);
		
			if ($result->num_rows == 1) {
				$row = $result->fetch_assoc();
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['role'] = trim($row['role']);  // Trim any leading or trailing spaces

			
				if ($_SESSION['role'] === 'admin') {
					echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>';
					echo "<script>Swal.fire({
						title: 'Login Successful!',
						text: 'Redirecting to admin dashboard...',
						icon: 'success',
						timer: 3000,
						timerProgressBar: true,
						showConfirmButton: false
					}).then(function() { window.location = 'admin/dashboard'; });</script>";
				}
				elseif ($_SESSION['role'] === 'user') {
					echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
					echo '<script>
					        swal({
					          title: "Login Successful",
					          text: "Redirecting to User dashboard...",
					          icon: "success"
					        }).then(function() {
					          window.location.href = "user/dashboard";
					        });
      					</script>';
				}
            }
}

?>