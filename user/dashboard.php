<?php
include "../backend/database.php";
include "../session.php";
include "log.php";


$role = $_SESSION['role'];


$sql = "SELECT * FROM tbl_users WHERE role = '$role'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $role = $row['role'];
    $strand_id = $row['strand_id'];
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
                    <label class="">DASHBOARD</label>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        // Retrieve user data from the database
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT * FROM tbl_users WHERE user_id = '$user_id'";
                        $result = $conn->query($query);

                        if ($result->num_rows == 1) {
                            $user_data = $result->fetch_assoc();

                            $role = $_SESSION['role'];

                            if ($role == 'stem') {
                                echo '<div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total of Books</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">';

                                $queryload = "SELECT COUNT(*) as count FROM tbl_books where strand_id = 1";
                                //  WHERE officeCreated =  $getOfficess
                                $result = mysqli_query($conn, $queryload);

                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $count = $row['count'];
                                }

                                echo '' . $count . '';

                                echo '</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Available Books</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">';

                                $queryload = "SELECT COUNT(*) as count1 FROM tbl_books where strand_id = 1 and  status = 'Available'";
                                //  WHERE officeCreated =  $getOfficess
                                $result = mysqli_query($conn, $queryload);

                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $count = $row['count1'];
                                }

                                echo '' . $count . '';

                                echo '</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Borrowed Books</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">';

                                $queryload = "SELECT COUNT(*) as count1 FROM tbl_books where strand_id = 1 and status = 'Borrowed'";
                                //  WHERE officeCreated =  $getOfficess
                                $result = mysqli_query($conn, $queryload);

                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $count = $row['count1'];
                                }

                                echo '' . $count . '';

                                echo '</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        ';
                                echo '
                                    <!-- Area Chart -->
                                    <div class="col-xl col-lg-7">
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Dropdown -->
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary mr-5">RECENT BOOKS</h6>
                                                <div class="date-range-container mr-auto"></div>
                                            </div>';

                                echo '
                                                <div class="card-body" style="height:660px;">
                                                <table id="booksTable" class="table table-striped" style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Author Type</th>
                                                            <th>Publisher</th>
                                                            <th>Year</th>
                                                            <th>Category</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
                                $query = "SELECT * FROM tbl_users WHERE strand_id = $strand_id";
                                $result = $conn->query($query);

                                if ($result->num_rows == 1) {
                                    // Fetch user data if available
                                    $user_data = $result->fetch_assoc();

                                    // Fetch book data
                                    $sql = "SELECT * FROM tbl_books WHERE strand_id = $strand_id";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // Loop through each row and display data
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['author']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['publisher']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                                    }
                                }

                            } elseif ($role == 'abm') {
                                echo '<div class="row">

                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Total of Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count FROM tbl_books where strand_id = 2 and  status = 'Available'";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clock fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Available Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count1 FROM tbl_books where strand_id = 2 and  status = 'Available'";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count1'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Borrowed Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count1 FROM tbl_books where strand_id = 2 and status = 'Borrowed'";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count1'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                ';
                                        echo '
                                            <!-- Area Chart -->
                                            <div class="col-xl col-lg-7">
                                                <div class="card shadow mb-4">
                                                    <!-- Card Header - Dropdown -->
                                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                        <h6 class="m-0 font-weight-bold text-primary mr-5">RECENT BOOKS</h6>
                                                        <div class="date-range-container mr-auto"></div>
                                                    </div>';
        
                                        echo '
                                                        <div class="card-body" style="height:660px;">
                                                        <table id="booksTable" class="table table-striped" style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <th>Author Type</th>
                                                                    <th>Publisher</th>
                                                                    <th>Year</th>
                                                                    <th>Category</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>';
                                        $query = "SELECT * FROM tbl_users WHERE strand_id = $strand_id";
                                        $result = $conn->query($query);
        
                                        if ($result->num_rows == 1) {
                                            // Fetch user data if available
                                            $user_data = $result->fetch_assoc();
        
                                            // Fetch book data
                                            $sql = "SELECT * FROM tbl_books WHERE strand_id = $strand_id";
                                            $result = mysqli_query($conn, $sql);
        
                                            if (mysqli_num_rows($result) > 0) {
                                                // Loop through each row and display data
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['author']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['publisher']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                                            }
                                        }
                            } elseif ($role == 'gas') {
                                echo '<div class="row">

                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Total of Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count FROM tbl_books where strand_id = 8";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clock fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Available Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count1 FROM tbl_books where strand_id = 8 and  status = 'Available'";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count1'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Borrowed Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count1 FROM tbl_books where strand_id = 8 and status = 'Borrowed'";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count1'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                ';
                                        echo '
                                            <!-- Area Chart -->
                                            <div class="col-xl col-lg-7">
                                                <div class="card shadow mb-4">
                                                    <!-- Card Header - Dropdown -->
                                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                        <h6 class="m-0 font-weight-bold text-primary mr-5">RECENT BOOKS</h6>
                                                        <div class="date-range-container mr-auto"></div>
                                                    </div>';
        
                                        echo '
                                                        <div class="card-body" style="height:660px;">
                                                        <table id="booksTable" class="table table-striped" style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <th>Author Type</th>
                                                                    <th>Publisher</th>
                                                                    <th>Year</th>
                                                                    <th>Category</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>';
                                        $query = "SELECT * FROM tbl_users WHERE strand_id = $strand_id";
                                        $result = $conn->query($query);
        
                                        if ($result->num_rows == 1) {
                                            // Fetch user data if available
                                            $user_data = $result->fetch_assoc();
        
                                            // Fetch book data
                                            $sql = "SELECT * FROM tbl_books WHERE strand_id = $strand_id";
                                            $result = mysqli_query($conn, $sql);
        
                                            if (mysqli_num_rows($result) > 0) {
                                                // Loop through each row and display data
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['author']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['publisher']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                                            }
                                        }

                            } elseif ($role == 'ict') {
                                echo '<div class="row">

                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Total of Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count FROM tbl_books where strand_id = 5";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clock fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Available Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count1 FROM tbl_books where strand_id = 5 and  status = 'Available'";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count1'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Borrowed Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count1 FROM tbl_books where strand_id = 5 and status = 'Borrowed'";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count1'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                ';
                                        echo '
                                            <!-- Area Chart -->
                                            <div class="col-xl col-lg-7">
                                                <div class="card shadow mb-4">
                                                    <!-- Card Header - Dropdown -->
                                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                        <h6 class="m-0 font-weight-bold text-primary mr-5">RECENT BOOKS</h6>
                                                        <div class="date-range-container mr-auto"></div>
                                                    </div>';
        
                                        echo '
                                                        <div class="card-body" style="height:660px;">
                                                        <table id="booksTable" class="table table-striped" style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <th>Author Type</th>
                                                                    <th>Publisher</th>
                                                                    <th>Year</th>
                                                                    <th>Category</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>';
                                        $query = "SELECT * FROM tbl_users WHERE strand_id = $strand_id";
                                        $result = $conn->query($query);
        
                                        if ($result->num_rows == 1) {
                                            // Fetch user data if available
                                            $user_data = $result->fetch_assoc();
        
                                            // Fetch book data
                                            $sql = "SELECT * FROM tbl_books WHERE strand_id = $strand_id";
                                            $result = mysqli_query($conn, $sql);
        
                                            if (mysqli_num_rows($result) > 0) {
                                                // Loop through each row and display data
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['author']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['publisher']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                                            }
                                        }

                            } elseif ($role == 'humss') {
                                echo '<div class="row">

                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Total of Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count FROM tbl_books where strand_id = 9";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clock fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Available Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count1 FROM tbl_books where strand_id = 9 and status = 'Available'";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count1'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Borrowed Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count1 FROM tbl_books where strand_id = 9 and status = 'Borrowed'";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count1'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                ';
                                        echo '
                                            <!-- Area Chart -->
                                            <div class="col-xl col-lg-7">
                                                <div class="card shadow mb-4">
                                                    <!-- Card Header - Dropdown -->
                                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                        <h6 class="m-0 font-weight-bold text-primary mr-5">RECENT BOOKS</h6>
                                                        <div class="date-range-container mr-auto"></div>
                                                    </div>';
        
                                        echo '
                                                        <div class="card-body" style="height:660px;">
                                                        <table id="booksTable" class="table table-striped" style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <th>Author Type</th>
                                                                    <th>Publisher</th>
                                                                    <th>Year</th>
                                                                    <th>Category</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>';
                                        $query = "SELECT * FROM tbl_users WHERE strand_id = $strand_id";
                                        $result = $conn->query($query);
        
                                        if ($result->num_rows == 1) {
                                            // Fetch user data if available
                                            $user_data = $result->fetch_assoc();
        
                                            // Fetch book data
                                            $sql = "SELECT * FROM tbl_books WHERE strand_id = $strand_id";
                                            $result = mysqli_query($conn, $sql);
        
                                            if (mysqli_num_rows($result) > 0) {
                                                // Loop through each row and display data
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['author']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['publisher']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                                            }
                                        }

                            } elseif ($role == 'authomotive') {
                                echo '<div class="row">

                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Total of Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count FROM tbl_books where strand_id = 7";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clock fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Available Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count1 FROM tbl_books where strand_id = 7 and status = 'Available'";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count1'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Borrowed Books</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">';
        
                                        $queryload = "SELECT COUNT(*) as count1 FROM tbl_books where strand_id = 7 and status = 'Borrowed'";
                                        //  WHERE officeCreated =  $getOfficess
                                        $result = mysqli_query($conn, $queryload);
        
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count1'];
                                        }
        
                                        echo '' . $count . '';
        
                                        echo '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                ';
                                        echo '
                                            <!-- Area Chart -->
                                            <div class="col-xl col-lg-7">
                                                <div class="card shadow mb-4">
                                                    <!-- Card Header - Dropdown -->
                                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                        <h6 class="m-0 font-weight-bold text-primary mr-5">RECENT BOOKS</h6>
                                                        <div class="date-range-container mr-auto"></div>
                                                    </div>';
        
                                        echo '
                                                        <div class="card-body" style="height:660px;">
                                                        <table id="booksTable" class="table table-striped" style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <th>Author Type</th>
                                                                    <th>Publisher</th>
                                                                    <th>Year</th>
                                                                    <th>Category</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>';
                                        $query = "SELECT * FROM tbl_users WHERE strand_id = $strand_id";
                                        $result = $conn->query($query);
        
                                        if ($result->num_rows == 1) {
                                            // Fetch user data if available
                                            $user_data = $result->fetch_assoc();
        
                                            // Fetch book data
                                            $sql = "SELECT * FROM tbl_books WHERE strand_id = $strand_id";
                                            $result = mysqli_query($conn, $sql);
        
                                            if (mysqli_num_rows($result) > 0) {
                                                // Loop through each row and display data
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['author']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['publisher']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                                            }
                                        }
                                    } else {
                                        echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                                    }
                                }
                            }




                    echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';

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

                    <!-- Include DataTables CSS and JS -->
                    <link rel="stylesheet" type="text/css"
                        href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
                    <script type="text/javascript" charset="utf8"
                        src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script type="text/javascript" charset="utf8"
                        src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
                    <script>
                        $(document).ready(function () {
                            $("#booksTable").DataTable({
                                "paging": true,
                                "searching": true,
                                "ordering": true
                            });
                        });
                    </script>

</body>

</html>