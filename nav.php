<?php
if (isset($_SESSION['user_id'])) {
    // Retrieve user data from the database
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM tbl_users WHERE user_id = '$user_id'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $user_data = $result->fetch_assoc();

        $role = $user_data['role'];



        if ($role == 'admin') {


            $query = "SELECT * FROM tbl_users";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $user = $row['username'];
            }
            echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">' . $user . '</div>
            </a>';
            echo '<hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>';

            echo '

            <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#strand"
        aria-expanded="true" aria-controls="strand">
        <i class="fas fa-fw fa-cog"></i>
        <span>Strand</span>
    </a>
    <div id="strand" class="collapse" aria-labelledby="headingTwo" data-parent="#strand">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Document Component:</h6>
            <a class="collapse-item" href="stem">STEM</a>
            <a class="collapse-item" href="abm">ABM</a>
            <a class="collapse-item" href="ict">ICT</a>
            <a class="collapse-item" href="humss">HUMSS</a>
            <a class="collapse-item" href="gas">GAS</a>
            <a class="collapse-item" href="automotive">AUTOMOTIVE</a>
        </div>
    </div>
</li>  
            <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Set-up</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Document Component:</h6>
            <a class="collapse-item" href="user">User</a>
            <a class="collapse-item" href="strand">Strand</a>
        </div>
    </div>
</li>  

            <li class="nav-item">
                <a class="nav-link collapsed" href="../backend/logout.php">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>logout</span>
                </a>
            </li>
 ';
        } elseif ($role == 'user') {
            $query = "SELECT * FROM tbl_users";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $user = $row['username'];
            }
            echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">' . $user . '</div>
            </a>';
            echo '<hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>';

            echo ' <li class="nav-item">
                <a class="nav-link collapsed" href="books">
                    <span>Books</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../backend/logout.php">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>logout</span>
                </a>
            </li>
';
        }
    }
}
