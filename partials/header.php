<?php

$isLoggedIn = isset($_SESSION['full_name']);
$userImage = $_SESSION['profile_pic'] ?? './assets/images/default-avtar.png';
?>

<!-- Header Section -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand logo" href="index.php">
                <h1>BigBounty</h1>
            </a>
            <!-- Profile Picture Toggle for Mobile Drawer -->
            <?php if ($isLoggedIn): ?>
                <button class="btn p-0 border-0 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNavbar" aria-controls="mobileNavbar">
                    <img src="<?= $userImage; ?>" alt="Profile" class="rounded-circle" width="40" height="40">
                </button>
            <?php else: ?>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <?php endif; ?>

            <div class="collapse navbar-collapse" id="desktopNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bounties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>

                <div class="d-none d-lg-flex ms-auto">
                    <?php if ($isLoggedIn): ?>
                        <!-- Profile Dropdown -->
                        <div class="dropdown">
                            <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?= $userImage; ?>" alt="Profile" class="rounded-circle me-2" width="40" height="40">
                                <span class="fw-bold"><?= htmlspecialchars($_SESSION['full_name']); ?></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user me-2"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="create-bounty.php"><i class="fas fa-plus-circle me-2"></i>Post Bounty</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="login.php" class="me-2 login-btn">Login</a>
                        <a href="register.php" class="register-btn">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>


    <!-- Offcanvas Drawer (Mobile) -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileNavbar" aria-labelledby="mobileNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="mobileNavbarLabel">BigBounty</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav mb-4">
                <li class="nav-item">
                    <a class="nav-link" href="#">Bounties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">How It Works</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
            </ul>

            <?php if ($isLoggedIn): ?>
                <!-- Clean, Professional Buttons (No Profile Picture or Name) -->
                <div class="d-grid gap-2">
                    <a href="profile.php" class="btn btn-outline-primary"><i class="fas fa-user me-2"></i>Profile</a>
                    <a href="post_bounty.php" class="btn btn-primary"><i class="fas fa-plus-circle me-2"></i>Post Bounty</a>
                    <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                </div>
            <?php else: ?>
                <div class="d-grid gap-2">
                    <a href="login.php" class="btn btn-outline-primary">Login</a>
                    <a href="register.php" class="btn btn-primary">Register</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>

<!-- FontAwesome (for icons) -->
<!-- <script src="https://kit.fontawesome.com/YOUR-KIT-ID.js" crossorigin="anonymous"></script> -->
