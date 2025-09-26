<?php
session_start();
require_once 'includes/config.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = trim($_POST['password']);
    
    require_once 'includes/auth.php';
    
    if (attemptAdminLogin($password)) {
        header("Location: admin_members.php");
        exit();
    } else {
        $error = "❌ Invalid admin password. Please try again. (Hint: admin123)";
    }
}

require_once 'includes/header.php';
?>

<div class="content-section">
    <h2 class="section-title">Admin Login</h2>
    <p style="text-align: center; margin-bottom: 2rem;">Gym management system access</p>
    
    <?php if ($error): ?>
        <div class="message error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="password">Admin Password</label>
            <input type="password" id="password" name="password" required placeholder="Enter admin password">
        </div>
        
        <button type="submit">Login as Admin</button>
    </form>
    
    <div style="margin-top: 20px; padding: 15px; background: #f8f9fa; border-radius: 6px;">
        <p><strong>Note:</strong> Default admin password is <code>admin123</code></p>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>