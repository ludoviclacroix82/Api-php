<?php
$userLogin = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="src/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="src/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">API</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="navbar-brand nav-link" href="/">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                    <?php if ($userLogin) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php if (!$userLogin) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login"><i class="fas fa-user-alt"></i>Login</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                        <a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>