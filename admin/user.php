<?php
include "../backend/database.php";
include "../backend/function.php";
include "../session.php";
include "log.php";


$role = $_SESSION['role'];


$sql = "SELECT * FROM tbl_users WHERE role = '$role'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $role = $row['role'];
    $id = $row['user_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script>
        function ajax_function(php_file, container) {
            $.ajax({
                url: php_file,
                type: 'GET',
                success: function(response) {
                    $(container).html(response);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed:', status, error);
                    $(container).html('<p>Error loading content. Please try again later.</p>');
                }
            });
        }
    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <?php include "../nav.php"; ?>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
sdjkkl
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <?php
                            echo '<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">' . $user . '</span>
                                <!-- <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg"> -->
                            </a>';
                            ?>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="javascript:void(0);" onclick="ajax_function('my_account','#maincontent');">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="ajax_function('pass','#maincontent');">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Password
                                </a>

                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid" id="maincontent">
                    <!-- Page Heading -->
                    <label class="">User Data</label>

                    <div class="container-fluid mt-4">

                        <div class="d-flex justify-content-end mb-3" style="margin-top:-60px;">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#adduser">

                                <i class="fas fa-user-plus"></i> Add Users
                            </button>

                            <?php
                            include "../modal/adduser.php";
                            ?> 
                        </div>

                        <table id="userTable" class="table table-bordered">
                            <thead class="table">
                                <tr>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Strand</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // Query to select users
                                $sql = "SELECT * FROM tbl_users";
                                $result = mysqli_query($conn, $sql);

                                // Check if the query returned any rows
                                if (mysqli_num_rows($result) > 0) {
                                    // Fetch each row and display it
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';  // Start a new row
                                        echo '<td>' . htmlspecialchars($row['username']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['role']) . '</td>';
                                        echo '<td>' . htmlspecialchars(strandName($row['strand_id'])) . '</td>';
                                        echo '<td>';

                                        echo "<form action='' method='post'>";
                                        echo "<input type='hidden' name='id' value='" . $row['user_id'] . "'>";
                                        echo "<button type='submit' name='send_pass' value='Send' class='btn btn-primary btn-sm m-1'>";
                                        echo '<i class="fa-regular fa-paper-plane"></i></button>';
                                        echo "</form>";
                                         
                                        echo '</tr>';
                                    }
                                } else {
                                    // If no users are found
                                    echo '<tr><td colspan="2" class="text-center">No users found</td></tr>';
                                }

                                // Free the result and close the connection
                                mysqli_free_result($result);
                                mysqli_close($conn);

                               
                   include '../email/send.php';
                   
                                ?>
                            </tbody>
                        </table>
                    </div>

                   

                    <!-- Content Column -->

                    <!-- Bootstrap core JavaScript-->
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Core plugin JavaScript-->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="js/sb-admin-2.min.js"></script>

                    <!-- Page level plugins -->
                    <script src="vendor/chart.js/Chart.min.js"></script>

                    <!-- Page level custom scripts -->
                    <script src="js/demo/chart-area-demo.js"></script>
                    <script src="js/demo/chart-pie-demo.js"></script>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <!-- Bootstrap JS -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
                    <!-- DataTables JS -->
                    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
                    

                    <script>
                        $(document).ready(function() {
                            // Initialize DataTables on your table
                            $('#userTable').DataTable({
                                "paging": true, // Enable pagination
                                "searching": true, // Enable search bar
                                "ordering": true // Enable sorting
                            });
                        });
                    </script>


</body>

</html>