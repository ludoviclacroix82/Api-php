<?php
$title = 'Dashboard';
require_once 'src/View/public/includes/header.php';
?>
<!-- Sidebar -->
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
            <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-secondary">
                    Navigation
                </h5>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" href="/dashboard">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="fas fa-user"></i>
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="fas fa-cog"></i>
                            Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/logout">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>


        <!-- End Sidebar -->

        <!-- Content -->
        <main role="main" class="col-md-10 ml-sm-auto px-4">
            <div class="pt-3 pb-2 mb-3 border-bottom">
            <h3 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-secondary">Dashboard</h3>
            </div>

            <div class="row">
                <!-- Profile Section -->
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            Profile Information
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5 class="card-title">Name</h5>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>User:</strong> User</p>
                                    <p><strong>Email:</strong> Email</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings Section -->
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            Keys Api
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- End Content -->
    </div>
</div>
<?php
require_once 'src/View/public/includes/footer.php';
?>