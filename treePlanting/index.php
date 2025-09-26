<?php
session_start();
require_once 'includes/config.php';
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

    /* ===== Navigation Bar ===== */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 3rem;
        background: #11998e;
        color: #fff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        position: sticky;
        top: 0;
        z-index: 1000;
    }
    .navbar .logo {
        font-size: 1.6rem;
        font-weight: 700;
        letter-spacing: 1px;
    }
    .navbar ul {
        list-style: none;
        display: flex;
        gap: 1.5rem;
        margin: 0;
        padding: 0;
    }
    .navbar ul li a {
        text-decoration: none;
        color: #fff;
        font-weight: 500;
        transition: color 0.2s;
    }
    .navbar ul li a:hover {
        color: #f0fdf4;
    }

    /* ===== Main Content ===== */
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
        font-size: 2.7rem;
        color: #11998e;
        margin-bottom: 1.2rem;
        letter-spacing: 1px;
        font-weight: 700;
    }
    .subtitle {
        text-align: center;
        font-size: 1.2rem;
        color: #555;
        margin-bottom: 2rem;
    }

    /* ===== Cards ===== */
    .membership-cards {
        display: flex;
        gap: 2rem;
        justify-content: center;
        margin: 3rem 0 2rem 0;
        flex-wrap: wrap;
    }
    .membership-card {
        flex: 1 1 250px;
        max-width: 280px;
        background: #f7f7f7;
        border-radius: 18px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.07);
        padding: 2rem 1.4rem;
        text-align: center;
        color: #fff;
        transition: transform 0.25s, box-shadow 0.25s;
        position: relative;
    }
    .membership-card:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 12px 36px rgba(17,153,142,0.15);
    }
    .membership-card h3 {
        font-size: 1.5rem;
        margin-bottom: 0.8rem;
        font-weight: 600;
    }
    .price {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 1rem;
        background: rgba(255,255,255,0.2);
        border-radius: 10px;
        padding: 0.4rem 0;
    }
    .membership-card ul {
        padding: 0;
        margin: 1.2rem 0;
        font-size: 1rem;
        list-style: none;
    }
    .membership-card li {
        margin: 0.6rem 0;
        text-align: left;
        padding-left: 1.5rem;
        position: relative;
    }
    .membership-card li::before {
        position: absolute;
        left: 0;
        top: 0.1rem;
    }
    .membership-card li:nth-child(1)::before { content: "🌳 "; }
    .membership-card li:nth-child(2)::before { content: "📄 "; }
    .membership-card li:nth-child(3)::before { content: "🎉 "; }
    .membership-card li:nth-child(4)::before { content: "🏆 "; }

    /* ===== CTA Button ===== */
    a.plant-tree-btn {
        display: inline-block;
        background: linear-gradient(90deg, #38ef7d, #11998e);
        color: white;
        padding: 16px 40px;
        text-decoration: none;
        border-radius: 40px;
        font-weight: bold;
        font-size: 1.2rem;
        box-shadow: 0 6px 18px rgba(56,239,125,0.2);
        transition: all 0.25s ease;
        margin-top: 1.5rem;
    }
    a.plant-tree-btn:hover {
        background: linear-gradient(90deg, #11998e, #38ef7d);
        box-shadow: 0 10px 28px rgba(56,239,125,0.3);
        transform: translateY(-3px);
    }

    @media (max-width: 900px) {
        .membership-cards {
            flex-direction: column;
            gap: 1.5rem;
        }
        .content-section {
            padding: 1.5rem;
        }
        .navbar {
            flex-direction: column;
            gap: 1rem;
        }
    }
</style>

<!-- ===== Navigation Bar ===== -->
<nav class="navbar">
    <div class="logo">🌱 Baraka Initiative</div>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="projects.php">Projects</a></li>
        <li><a href="signup.php">Join Us</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</nav>

<div class="content-section">
    <h2 class="section-title">Welcome to Baraka Tree Planting Initiative</h2>
    <p class="subtitle">Planting Trees for a Greener Tomorrow</p>
    
    <div style="text-align: center; margin: 2rem 0;">
        <div style="font-size: 4rem; margin-bottom: 1rem;">🌳🌱</div>
        <h3 style="color: #11998e; margin-bottom: 1rem; font-size: 1.5rem;">Join Our Mission to Plant 10,000 Trees</h3>
        <p style="color: #555;">Be part of our community and help restore nature by planting trees in your area.</p>
    </div>
    
    <div class="membership-cards">
        <div class="membership-card" style="background: linear-gradient(135deg, #38ef7d 0%, #11998e 100%);">
            <h3>Supporter</h3>
            <div class="price">$10/tree</div>
            <ul>
                <li>Plant 1 Tree</li>
                <li>Digital Certificate</li>
                <li>❌ Event Invitation</li>
                <li>❌ Recognition Plaque</li>
            </ul>
        </div>
        
        <div class="membership-card" style="background: linear-gradient(135deg, #f7931e 0%, #ff6b35 100%);">
            <h3>Advocate</h3>
            <div class="price">$50/5 trees</div>
            <ul>
                <li>Plant 5 Trees</li>
                <li>Digital Certificate</li>
                <li>Event Invitation</li>
                <li>❌ Recognition Plaque</li>
            </ul>
        </div>
        
        <div class="membership-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <h3>Champion</h3>
            <div class="price">$200/25 trees</div>
            <ul>
                <li>Plant 25 Trees</li>
                <li>Digital Certificate</li>
                <li>Event Invitation</li>
                <li>Recognition Plaque</li>
            </ul>
        </div>
    </div>
    
    <div style="text-align: center;">
        <a href="signup.php" class="plant-tree-btn">PLANT A TREE WITH US TODAY!</a>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
