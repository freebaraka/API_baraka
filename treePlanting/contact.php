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
        max-width: 800px;
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
        margin-bottom: 1.2rem;
        letter-spacing: 1px;
        font-weight: 700;
    }
    .subtitle {
        text-align: center;
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 2rem;
    }

    /* ===== Contact Form ===== */
    form {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
    }
    label {
        font-weight: 600;
        color: #444;
    }
    input, textarea {
        padding: 0.9rem;
        border: 1px solid #ccc;
        border-radius: 10px;
        font-size: 1rem;
        width: 100%;
    }
    textarea {
        min-height: 150px;
    }
    button {
        background: linear-gradient(90deg, #38ef7d, #11998e);
        color: #fff;
        padding: 14px;
        border: none;
        border-radius: 40px;
        font-weight: bold;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.25s ease;
        box-shadow: 0 6px 18px rgba(56,239,125,0.2);
    }
    button:hover {
        background: linear-gradient(90deg, #11998e, #38ef7d);
        box-shadow: 0 10px 28px rgba(56,239,125,0.3);
        transform: translateY(-3px);
    }

    @media (max-width: 900px) {
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
        <li><a href="about.php">About</a></li>
        <li><a href="projects.php">Projects</a></li>
        <li><a href="signup.php">Join Us</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</nav>

<div class="content-section">
    <h2 class="section-title">Contact Us</h2>
    <p class="subtitle">We’d love to hear from you! Fill out the form below and our team will get back to you.</p>

    <form action="send_message.php" method="POST">
        <div>
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" required>
        </div>

        <div>
            <label for="message">Message</label>
            <textarea id="message" name="message" required></textarea>
        </div>

        <button type="submit">Send Message</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>
