<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$is_logged_in = isset($_SESSION['user_id']);
$full_name = $_SESSION['full_name'] ?? '';

$first_name = '';
if (!empty($full_name)) {
    $name_parts = explode(' ', $full_name);
    $first_name = $name_parts[0];
}
?>

<header class="navbar">
    <div class="nav-container">

        <!-- Logo -->
        <div class="logo-section">
            <span class="material-symbols-outlined logo-icon">location_searching</span>
            <h2><a href="dashboard.php" class="logo-link">Smart Lost & Found</a></h2>
        </div>

        <!-- Hamburger -->
        <button class="hamburger-menu" id="hamburger-toggle">
            <span></span><span></span><span></span>
        </button>

        <!-- Nav -->
        <nav class="nav-links" id="nav-links">

            <a href="dashboard.php" class="nav-item-link">Home</a>
            <a href="search.php" class="nav-item-link">Search</a>

            <?php if ($is_logged_in): ?>
                <a href="upload-item.php" class="report-btn">
                    <span class="material-symbols-outlined">add_circle</span>
                    Report Item
                </a>

                <div class="user-menu">
                    <span class="material-symbols-outlined">account_circle</span>
                    <span class="user-name"><?php echo htmlspecialchars($first_name); ?></span>

                    <a href="logout.php" class="logout-btn">
                        <span class="material-symbols-outlined">logout</span>
                        Logout
                    </a>
                </div>

            <?php else: ?>
                <a href="login.php" class="login-btn">Login</a>
                <a href="register.php" class="register-btn">Register</a>
            <?php endif; ?>

            <div class="nav-indicator" id="nav-indicator"></div>
        </nav>

    </div>
</header>

<!-- IMPORTANT: FIX ICONS -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/navbar.css">
<script src="assets/js/navbar.js"></script>

