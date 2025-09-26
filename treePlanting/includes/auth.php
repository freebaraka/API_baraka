<?php
function requireAdminAuth() {
    session_start();
    
    // Check if user is logged in as admin
    $isAdmin = isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
    
    if (!$isAdmin) {
        // Redirect to admin login page if not authenticated
        header("Location: admin_login.php");
        exit();
    }
}

function attemptAdminLogin($password) {
    // Define your admin password here
    $adminPassword = "1234"; // Change this to your desired password
    
    if ($password === $adminPassword) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_login_time'] = time();
        return true;
    }
    
    return false;
}

function adminLogout() {
    session_start();
    unset($_SESSION['admin_logged_in']);
    unset($_SESSION['admin_login_time']);
    session_destroy();
}
?>