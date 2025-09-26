<?php
session_start();
require_once 'includes/config.php';

$error = '';
$success = '';

// Create the members table if it does not exist
$tableSql = "CREATE TABLE IF NOT EXISTS members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    membership_type VARCHAR(20) NOT NULL,
    join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($tableSql)) {
    $error = "❌ Table creation error: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !$error) {
    $name = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $membership_type = trim($_POST['membership_type']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "❌ Invalid email format!";
    } else {
        // Check if email already exists
        $check = $conn->prepare("SELECT id FROM members WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "⚠️ This email is already registered. Please use another email.";
        } else {
            // Insert into DB
            $stmt = $conn->prepare("INSERT INTO members (username, email, password, membership_type) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $password, $membership_type);

            if ($stmt->execute()) {
                $success = "✅ Registration successful! Welcome to the Tree Planting Community.";
                
                // Set session for auto-login
                $_SESSION['user_id'] = $stmt->insert_id;
                $_SESSION['username'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['membership_type'] = $membership_type;
                
                // Send welcome email
                $emailSent = sendSimpleWelcomeEmail($email, $name, $membership_type);
                if ($emailSent) {
                    $success .= " 📧 Welcome email sent!";
                } else {
                    $success .= " ⚠️ (Email notification skipped - check configuration)";
                }
            } else {
                $error = "❌ Error: " . $stmt->error;
            }
            $stmt->close();
        }
        $check->close();
    }
}

// Simple email function for testing
function sendSimpleWelcomeEmail($email, $username, $membership_type) {
    $subject = "Welcome to Baraka Tree Planting Initiative!";
    $message = "
    Hello $username!
    
    Thank you for joining the Baraka Tree Planting Initiative. 
    Your '$membership_type' membership is now active. 🌱
    
    Together, we’re working toward a greener tomorrow.
    
    Best regards,
    Baraka Initiative Team
    ";
    
    $headers = "From: info@barakainitiative.org\r\n";
    
    if (mail($email, $subject, $message, $headers)) {
        return true;
    }
    return false;
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
        max-width: 700px;
        margin: 3rem auto;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 8px 28px rgba(17,153,142,0.08);
        padding: 2.5rem 2rem;
    }
    .section-title {
        text-align: center;
        font-size: 2.2rem;
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
    .form-group input, .form-group select {
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
    .message.success {
        background: #dcfce7;
        color: #166534;
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
    <h2 class="section-title">Become a Member</h2>
    <p class="subtitle">Join our mission to plant 10,000 trees 🌳</p>
    
    <?php if ($error): ?>
        <div class="message error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <?php if ($success): ?>
        <div class="message success"><?php echo $success; ?></div>
        <div style="text-align: center; margin-top: 20px;">
            <a href="members.php" class="plant-tree-btn">Go to Your Dashboard →</a>
        </div>
    <?php else: ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Full Name</label>
                <input type="text" id="username" name="username" required placeholder="Enter your full name" 
                    value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email" 
                    value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Create a secure password">
            </div>
            
            <div class="form-group">
                <label for="membership_type">Membership Type</label>
                <select id="membership_type" name="membership_type" required>
                    <option value="">Select Membership</option>
                    <option value="supporter" <?php echo (isset($_POST['membership_type']) && $_POST['membership_type'] == 'supporter') ? 'selected' : ''; ?>>Supporter - $10/tree</option>
                    <option value="advocate" <?php echo (isset($_POST['membership_type']) && $_POST['membership_type'] == 'advocate') ? 'selected' : ''; ?>>Advocate - $50/5 trees</option>
                    <option value="champion" <?php echo (isset($_POST['membership_type']) && $_POST['membership_type'] == 'champion') ? 'selected' : ''; ?>>Champion - $200/25 trees</option>
                </select>
            </div>
            
            <button type="submit">Join the Initiative</button>
        </form>
        
        <p class="link">
            Already a member? <a href="login.php">Login here</a>
        </p>
    <?php endif; ?>
</div>

<?php require_once 'includes/footer.php'; ?>
