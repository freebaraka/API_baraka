<?php
require_once 'includes/auth.php';
adminLogout();
header("Location: admin_login.php");
exit();
?>