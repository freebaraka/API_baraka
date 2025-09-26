<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerFit Gym - Transform Your Body</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
        }
        
        .header {
            background: linear-gradient(90deg, #ff6b35 0%, #f7931e 100%);
            padding: 1rem 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo::before {
            content: "💪";
            font-size: 2.5rem;
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        
        .nav-links a:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }
        
        .content-section {
            background: white;
            margin: 2rem auto;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 800px;
        }
        
        .section-title {
            color: #ff6b35;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-align: center;
            background: linear-gradient(90deg, #ff6b35, #f7931e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #2d3748;
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #ff6b35;
            box-shadow: 0 0 0 3px rgba(255,107,53,0.1);
        }
        
        button {
            background: linear-gradient(90deg, #ff6b35 0%, #f7931e 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,107,53,0.4);
        }
        
        .message {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
            font-weight: 600;
        }
        
        .error {
            background: #fed7d7;
            color: #c53030;
            border: 1px solid #feb2b2;
        }
        
        .success {
            background: #c6f6d5;
            color: #2d784d;
            border: 1px solid #9ae6b4;
        }
        
        .membership-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }
        
        .membership-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .membership-card:hover {
            transform: translateY(-5px);
        }
        
        .membership-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .membership-card .price {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 1rem 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        
        th {
            background: #ff6b35;
            color: white;
        }
        
        tr:hover {
            background: #f7fafc;
        }
        
        .footer {
            background: #1a202c;
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 3rem;
        }
        
        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                gap: 1rem;
            }
            
            .nav-links {
                gap: 1rem;
            }
            
            .content-section {
                margin: 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="nav">
                <a href="index.php" class="logo">TreePlanting</a>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="plant_tree.php">Plant a Tree</a></li>
                    <li><a href="trees.php">View Trees</a></li>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li><a href="profile.php">My Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                    <li><a href="admin_login.php">Admin</a></li>
                </ul>
            </nav>
        </div>
    </header>