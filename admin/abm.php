<?php
include "../backend/database.php";
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
                            echo'<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$user.'</span>
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
                     <label class="">Thesis </label>
    <?php
$query = "SELECT * FROM tbl_books where strand_id = 2";
$result = $conn->query($query);
echo '<div class="d-flex flex-wrap">';

while ($row = $result->fetch_assoc()) {
    $title = $row['title'];
    $id = $row['book_id'];
    $author = $row['author'];
    $publisher = $row['publisher'];
    $category = $row['category'];
  echo'
    <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-1">';

            
                echo'<button class="btn btn-primary float-right" data-toggle="modal" data-target="#abm' . $id . '">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M13.473 0.849c-0.195-0.195-0.512-0.195-0.707 0l-2.291 2.291-8.16 8.16c-0.419 0.419-0.586 1.049-0.462 1.628l1.393-1.393 8.16-8.16 2.291-2.291c0.195-0.195 0.195-0.512 0-0.707zM11.68 2.643l1.439-1.439c0.293-0.293 0.77-0.293 1.063 0l0.955 0.954c0.293 0.293 0.293 0.77 0 1.063l-1.439 1.439-1.064-1.063zM2.803 12.52l-0.954-0.954L11.68 2.643l0.954 0.954L2.803 12.52z"></path>
                    <path fill-rule="evenodd" d="M14.854 3.646l-2.5-2.5a1 1 0 0 0-1.415 0l-9.586 9.586a1 1 0 0 0-0.271 0.464l-0.669 2.676a1 1 0 0 0 1.282 1.283l2.676-0.669a1 1 0 0 0 0.464-0.271l9.586-9.586a1 1 0 0 0 0-1.415zM3.207 14.207l0.665-2.658 1.993 1.993-2.658 0.665zm9.586-9.586l-0.665 2.658-1.993-1.993 2.658-0.665z"></path>
                </svg>
            </button>


                      <div class="text-l text-center font-weight-bold text-info text-uppercase mb-1">
                        '.$title.'
                        </div><br>
                    <div class="row no-gutters align-items-center">

                            <div class="col-4 text-center">
                                Author<br> '.$author.'
                            </div>

                        <div class="col-4 text-center">
                                Publisher<br> '.$publisher.'
                            </div>

                        <div class="col-4 text-center">
                                Category<br> '.$category.'
                            </div>

                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
';
include '../modal/modal.php';
}

?>

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

</body>

</html>