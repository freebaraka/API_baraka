<?php
session_start();
require_once 'includes/config.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Check if user exists in tree planting system
    $stmt = $conn->prepare("SELECT id, username, password, membership_type FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $hashed_password, $membership_type);

    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        // Set session variables
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['membership_type'] = $membership_type;

        // Redirect to dashboard
        header("Location: members.php");
        exit();
    } else {
        $error = "❌ Invalid email or password. Please try again.";
    }
    $stmt->close();
}
?>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, #f0fdf4 0%, #eff6ff 100%);
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }
    .content-section {
        max-width: 500px;
        margin: 4rem auto;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 8px 28px rgba(17,153,142,0.08);
        padding: 2.5rem 2rem;
    }
    .section-title {
        text-align: center;
        font-size: 2rem;
        color: #11998e;
        margin-bottom: 1rem;
        font-weight: 700;
    }
    .subtitle {
        text-align: center;
        color: #555;
        margin-bottom: 2rem;
    }
    .form-group {
        margin-bottom: 1.2rem;
    }
    .form-group label {
        display: block;
        margin-bottom: 0.4rem;
        font-weight: 600;
        color: #333;
    }
    .form-group input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 10px;
        font-size: 1rem;
    }
    button {
        width: 100%;
        padding: 14px;
        background: linear-gradient(90deg, #38ef7d, #11998e);
        color: #fff;
        border: none;
        border-radius: 30px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.25s ease;
    }
    button:hover {
        background: linear-gradient(90deg, #11998e, #38ef7d);
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(56,239,125,0.25);
    }
    .message {
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 1.2rem;
        text-align: center;
        font-weight: 600;
    }
    .message.error {
        background: #fee2e2;
        color: #b91c1c;
    }
    .link {
        text-align: center;
        margin-top: 1.2rem;
        font-size: 0.95rem;
    }
    .link a {
        color: #11998e;
        font-weight: 600;
        text-decoration: none;
    }
    .link a:hover {
        text-decoration: underline;
    }
</style>

<div class="content-section">
    <h2 class="section-title">Member Login</h2>
    <p class="subtitle">Access your dashboard and track your 🌳 planting progress</p>

    <?php if ($error): ?>
        <div class="message error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email address">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
        </div>

        <button type="submit">Login to Your Account</button>
    </form>

    <p class="link">
        Not a member yet? <a href="signup.php">Join now</a>
    </p>
</div>

<?php require_once 'includes/footer.php'; ?>
