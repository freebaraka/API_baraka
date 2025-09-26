<?php
// Sample data for tree planting projects
$projects = [
    [
        'name' => 'Green Future Initiative',
        'location' => 'Nairobi, Kenya',
        'description' => 'A community-driven project planting indigenous trees to restore local ecosystems.',
        'photo' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=800&q=80'
    ],
    [
        'name' => 'Urban Forest Project',
        'location' => 'Berlin, Germany',
        'description' => 'Transforming urban spaces into green havens by planting thousands of trees.',
        'photo' => 'https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=800&q=80'
    ],
    [
        'name' => 'Rainforest Revival',
        'location' => 'Amazon, Brazil',
        'description' => 'Supporting reforestation efforts in the Amazon rainforest.',
        'photo' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=800&q=80'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tree Planting Projects | Baraka Initiative</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #f0fdf4 0%, #eff6ff 100%);
            color: #333;
        }
        header {
            background: #11998e;
            color: #fff;
            padding: 1rem 2rem;
        }
        header h1 {
            margin: 0;
            font-weight: 700;
        }
        nav {
            margin-top: 0.5rem;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 1.5rem;
            font-weight: 500;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 1100px;
            margin: 3rem auto;
            padding: 0 1rem;
        }
        .page-title {
            text-align: center;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: #11998e;
        }
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        .project-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(17,153,142,0.12);
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .project-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 32px rgba(17,153,142,0.18);
        }
        .project-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .project-card .details {
            padding: 1.2rem 1.5rem;
        }
        .project-card h2 {
            margin: 0 0 0.5rem 0;
            font-size: 1.3rem;
            color: #11998e;
        }
        .project-card p {
            margin: 0.3rem 0;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        footer {
            background: #11998e;
            color: #fff;
            text-align: center;
            padding: 1.5rem;
            margin-top: 3rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Baraka Initiative</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="projects.php">Projects</a>
            <a href="signup.php">Join</a>
            <a href="login.php">Login</a>
        </nav>
    </header>

    <div class="container">
        <h2 class="page-title">Our Tree Planting Projects</h2>
        <div class="projects-grid">
            <?php foreach ($projects as $project): ?>
                <div class="project-card">
                    <img src="<?php echo htmlspecialchars($project['photo']); ?>" alt="<?php echo htmlspecialchars($project['name']); ?>">
                    <div class="details">
                        <h2><?php echo htmlspecialchars($project['name']); ?></h2>
                        <p><strong>Location:</strong> <?php echo htmlspecialchars($project['location']); ?></p>
                        <p><?php echo htmlspecialchars($project['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Baraka Initiative. All rights reserved.</p>
    </footer>
</body>
</html>
