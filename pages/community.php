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



// Fetch community posts from the database
$sql = "SELECT * FROM community_posts ORDER BY created_at DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
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

// Handle new post submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    $sql = "INSERT INTO community_posts (title, content, author, image) VALUES ('$title', '$content', '$author', '$image')";

    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Post uploaded successfully";
        } else {
            echo "Failed to upload image";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch community posts from the database
$sql = "SELECT * FROM community_posts ORDER BY created_at DESC";
$result = $conn->query($sql);

$conn->close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community - Gamer's Profile</title>
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

        .post-container {
            width: 100%;
            max-width: 800px;
            background-color: #2c2c2c;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
        }

        .post-container h2 {
            color: #ffcc00;
            margin-bottom: 10px;
        }

        .post-container p {
            color: #c5c6c7;
        }

        .post-container .post-meta {
            font-size: 0.9rem;
            color: #888;
            margin-top: 10px;
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
        <h1>Community Posts</h1>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="post-container">
                    <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                    <p><?php echo htmlspecialchars($row['content']); ?></p>
                    <div class="post-meta">
                        Posted by <?php echo htmlspecialchars($row['author']); ?> on <?php echo htmlspecialchars($row['created_at']); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No community posts found.</p>
        <?php endif; ?>
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>Contact Us</h4>
                <ul>
                    <li>Email: parmarmanav730@gmail.com</li>
                    <li>Phone: +91 9313252548</li>
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