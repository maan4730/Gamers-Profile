<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer's Profile Manager</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.6;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, #1a237e, #4a148c);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        header h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        /* Navigation Styles */
        nav {
            background-color: rgba(255,255,255,0.1);
            padding: 0.5rem;
        }

        nav ul {
            list-style-type: none;
            text-align: center;
        }

        nav ul li {
            display: inline-block;
            margin: 0 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 5px 15px;
            border-radius: 20px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: rgba(255,255,255,0.2);
        }

        /* Main Content Styles */
        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 20px;
        }

        section {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .welcome {
            text-align: center;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
        }

        .welcome h2 {
            color: #1a237e;
            margin-bottom: 1rem;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }

        .feature-card {
            padding: 1.5rem;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .statistics {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            text-align: center;
        }

        .stat-card {
            background-color: #f5f5f5;
            padding: 1rem;
            border-radius: 8px;
        }

        .news-section {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .news-card {
            padding: 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
        }

        /* Footer Styles */
        footer {
            background: linear-gradient(135deg, #1a237e, #4a148c);
            color: white;
            text-align: center;
            padding: 1.5rem 0;
            margin-top: 2rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            padding: 0 20px;
        }

        .footer-section h4 {
            margin-bottom: 1rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section ul li a {
            color: white;
            text-decoration: none;
        }

        .footer-bottom {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>Gamer's Profile</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="profiles.php">Profiles</a></li>
                <li><a href="games.php">Games</a></li>
                <li><a href="community.php">Community</a></li>
                <li><a href="tournaments.php">Tournaments</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="welcome">
            <h2>Welcome to the Gamer's Profile Manager</h2>
            <p>Your ultimate destination for managing gaming profiles, tracking achievements, and connecting with fellow gamers.</p>
        </section>

        <section class="statistics">
            <div class="stat-card">
                <h3>Active Users</h3>
                <p>10,000+</p>
            </div>
            <div class="stat-card">
                <h3>Games Tracked</h3>
                <p>500+</p>
            </div>
            <div class="stat-card">
                <h3>Communities</h3>
                <p>200+</p>
            </div>
            <div class="stat-card">
                <h3>Daily Active Players</h3>
                <p>5,000+</p>
            </div>
        </section>

        <section class="features">
            <div class="feature-card">
                <h3>Profile Management</h3>
                <p>Create and customize your gaming profile with achievements, statistics, and favorite games.</p>
            </div>
            <div class="feature-card">
                <h3>Game Progress Tracking</h3>
                <p>Keep track of your achievements, completion rates, and gaming milestones.</p>
            </div>
            <div class="feature-card">
                <h3>Community Features</h3>
                <p>Join gaming communities, participate in discussions, and make new friends.</p>
            </div>
            <div class="feature-card">
                <h3>Tournament System</h3>
                <p>Organize and participate in gaming tournaments with players worldwide.</p>
            </div>
        </section>

        <section class="news-section">
            <div class="news-card">
                <h3>Latest Updates</h3>
                <p>New features and improvements added to enhance your gaming experience.</p>
            </div>
            <div class="news-card">
                <h3>Upcoming Events</h3>
                <p>Check out the schedule for upcoming tournaments and gaming events.</p>
            </div>
            <div class="news-card">
                <h3>Community Highlights</h3>
                <p>Featured stories and achievements from our gaming community.</p>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Community</h4>
                <ul>
                    <li><a href="#">Forums</a></li>
                    <li><a href="#">Discord Server</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Support</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Connect With Us</h4>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">YouTube</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; Gamer's Profile. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>