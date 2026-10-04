<?php
include_once __DIR__ . "/../config/db.php";
include_once __DIR__ . "/../include/core.php";

$currentPage = basename($_SERVER['PHP_SELF']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWRI Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>

<style>
    .active a {
    color: #C99700 !important;
    font-weight: bold;
}
</style>
<body>


<div class="admin-wrapper">

<!-- Sidebar -->
    <aside class="sidebar" id="sidebar">

        <div class="sidebar-header">
            <h4>SWRI Admin</h4>

            <button class="btn-close d-lg-none" id="closeSidebar"></button>
        </div>

        <ul class="sidebar-menu">

            <li class="<?= ($currentPage == 'dashboard.php') ? 'active' : ''; ?>">
                <a href="dashboard.php">
                    <i class="fas fa-house"></i>
                    Home Page
                </a>
            </li>

            <li class="<?= ($currentPage == 'about.php') ? 'active' : ''; ?>">

                <a href="about.php">
                    <i class="fas fa-circle-info"></i>
                    About Us
                </a>
            </li>

            <li class="<?= ($currentPage == 'programs.php') ? 'active' : ''; ?>">

                <a href="programs.php">
                    <i class="fas fa-book-open"></i>
                    Programs
                </a>
            </li>

            <li class="<?= ($currentPage == 'leadership.php') ? 'active' : ''; ?>">

                <a href="leadership.php">
                    <i class="fas fa-users"></i>
                    Leadership
                </a>
            </li>

            <li class="<?= ($currentPage == 'news.php') ? 'active' : ''; ?>">
                <a href="news.php">
                    <i class="fas fa-newspaper"></i>
                    News & Events
                </a>
            </li>
            
            <li class="<?= ($currentPage == 'get-involved.php') ? 'active' : ''; ?>">
                <a href="get-involved.php">
                    <i class="fas fa-handshake"></i>
                    Contributors
                </a>
            </li>

            <li class="<?= ($currentPage == 'contact.php') ? 'active' : ''; ?>">
                <a href="contact.php">
                    <i class="fas fa-envelope"></i>
                    Contact
                </a>
            </li>

            <li class="<?= ($currentPage == 'setting.php') ? 'active' : ''; ?>">
                <a href="setting.php">
                    <i class="fas fa-cog"></i>
                    Setting
                </a>
            </li>

            <li>
                <a href="logout.php">
                    <i class="fas fa-sign-out"></i>
                    Logout
                </a>
            </li>

        </ul>

    </aside>

    
    <!-- Overlay -->
    <div class="sidebar-overlay" id="overlay"></div>

    <!-- Main -->
    <div class="main-content">
