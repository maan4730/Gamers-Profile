<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gamers_profile";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Gamer's Profile</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Garamond', cursive;
            background-color: #1a1a1d;
            color: #c5c6c7;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        nav {
            background: rgba(0, 0, 0, 0.8);
            padding: 0.5rem;
            position: sticky;
            top: 0;
            z-index: 1000;
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
            color: rgb(255, 0, 0);
            text-decoration: none;
            font-weight: 600;
            padding: 5px 15px;
            border-radius: 20px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.91);
        }

        .content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .content h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #fff;
        }

        .content p {
            font-size: 1.2rem;
            max-width: 800px;
            text-align: center;
            margin-bottom: 20px;
        }

        .content img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        footer {
            background: linear-gradient(135deg, rgb(31, 31, 34), rgb(26, 26, 26));
            color: white;
            text-align: center;
            padding: 1.5rem 0;
            position: relative;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="games.php">Games</a></li>
            <li><a href="community.php">Community</a></li>
            <li><a href="tournaments.php">Tournaments</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
    </nav>

    <div class="content">
        <h1>About Us</h1>
        <p>Welcome to Gamer's Profile, your ultimate destination for managing and showcasing your gaming achievements. Our platform allows gamers to create profiles, add their favorite games, and share their gaming experiences with the community.</p>
        <p>Our mission is to bring gamers together and provide a space where they can connect, compete, and celebrate their love for gaming. Whether you're a casual player or a hardcore gamer, Gamer's Profile is the perfect place to track your progress and stay updated with the latest in the gaming world.</p>
        <img src="../pages/logo.jpg" alt="About Us">
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>Contact Us</h4>
                <ul>
                    <li>Email: parmarmanav730@gmail.com</li>
                    <li>Phone: +91  9313252548</li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram: me_maan_1</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 202 Gamer's Profile. All rights reserved.
        </div>
    </footer>
</body>
</html>