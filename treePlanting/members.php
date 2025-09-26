<?php
session_start();
require_once 'includes/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
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
        color: #333;
    }

    .content-section {
        max-width: 1000px;
        margin: 3rem auto;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 8px 28px rgba(17,153,142,0.08);
        padding: 3rem 2.5rem;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        color: #11998e;
        margin-bottom: 2rem;
        font-weight: 700;
    }

    /* Dashboard Cards */
    .dashboard-cards {
        display: flex;
        gap: 2rem;
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 2.5rem;
    }
    .dashboard-card {
        flex: 1 1 250px;
        max-width: 280px;
        border-radius: 18px;
        color: white;
        padding: 2rem 1.5rem;
        text-align: center;
        font-weight: 500;
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        transition: transform 0.25s, box-shadow 0.25s;
    }
    .dashboard-card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 12px 28px rgba(0,0,0,0.15);
    }
    .dashboard-card h3 {
        margin-bottom: 0.8rem;
        font-weight: 600;
    }
    .dashboard-card p {
        font-size: 1.2rem;
        font-weight: bold;
    }

    /* Benefits Box */
    .benefits-box {
        background: #f9fafb;
        border-radius: 16px;
        padding: 2rem;
        margin: 2rem 0;
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
    }
    .benefits-box h3 {
        color: #ff6b35;
        margin-bottom: 1.2rem;
        font-weight: 600;
        font-size: 1.4rem;
    }
    .benefits-box ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .benefits-box li {
        padding: 0.6rem 0;
        font-size: 1.05rem;
    }

    /* Logout Button */
    .logout-btn {
        display: inline-block;
        background: linear-gradient(90deg, #e74c3c, #c0392b);
        color: white;
        padding: 14px 32px;
        text-decoration: none;
        border-radius: 40px;
        font-weight: bold;
        font-size: 1.1rem;
        transition: all 0.25s ease;
    }
    .logout-btn:hover {
        background: linear-gradient(90deg, #c0392b, #e74c3c);
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(231,76,60,0.3);
    }
</style>

<div class="content-section">
    <h2 class="section-title">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! 👋</h2>

    <div class="dashboard-cards">
        <div class="dashboard-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <h3>Membership Type</h3>
            <p><?php echo strtoupper(htmlspecialchars($_SESSION['membership_type'])); ?></p>
        </div>

        <div class="dashboard-card" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
            <h3>Member Since</h3>
            <p><?php echo date('M Y'); ?></p>
        </div>

        <div class="dashboard-card" style="background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);">
            <h3>Status</h3>
            <p>Active ✅</p>
        </div>
    </div>

    <div class="benefits-box">
        <h3>Your Membership Benefits</h3>
        <ul>
            <li>✅ Access to state-of-the-art equipment</li>
            <li>✅ <?php echo $_SESSION['membership_type'] === 'basic' ? 'Limited' : 'Unlimited'; ?> group fitness classes</li>
            <li>✅ <?php echo $_SESSION['membership_type'] !== 'basic' ? 'Personal trainer sessions' : 'Basic equipment only'; ?></li>
            <li>✅ Locker room and shower facilities</li>
            <?php if ($_SESSION['membership_type'] === 'elite'): ?>
                <li>✅ 24/7 gym access</li>
                <li>✅ Premium supplements discount</li>
            <?php endif; ?>
        </ul>
    </div>

    <div style="text-align: center; margin-top: 2rem;">
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
