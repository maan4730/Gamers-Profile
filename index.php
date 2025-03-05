<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer's Profile</title>
    <style>
        /* Reset and Base Styles */
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

        /* Header Styles */

        /* Navigation Styles */
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
            color:rgb(255, 0, 0);
            text-decoration: none;
            font-weight: 600;
            padding: 5px 15px;
            border-radius: 20px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.91);
        }

        /* Video Background Styles */
        .video-background {
            position: relative;
            top: 0;
            width: 100%;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
        }

        /* Main Content Styles */
        .content {
            flex: 1;
            position: relative;
            z-index: 1;
        }

        /* Game Container Styles */
        .game-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
            padding: 20px;
            position: relative;
            top: 5vh;
            z-index: 1;
        }

        .game-box {
            background:rgba(255, 255, 255, 0.83);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            width: 320px; /* Increased width */
            height: 350px;
        }

        .game-box img {
            width: 320px; /* Increased width */
            height: 280px;
            transition: transform 0.3s;
        }

        .game-box img:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            

        }

        .game-box h3 {
            margin: 15px 0;
            font-size: 1.5rem;
            color:rgb(0, 4, 4);
        }

        .game-box p {
            padding: 0 15px 15px;
            font-size: 1rem;
            color: #c5c6c7;
        }

        /* Footer Styles */
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
            <li><a href="index.php">Home</a></li>
            <li><a href="../Gamers-Profile/pages/profile.php">Profile</a></li>
            <li><a href="games.php">Games</a></li>
            <li><a href="community.php">Community</a></li>
            <li><a href="../Gamers-Profile/pages/tournament.php">Tournaments</a></li>
            <li><a href="../Gamers-Profile/pages/about.php">About</a></li>
        </ul>
    </nav>

    <div class="content">
        <video class="video-background" autoplay muted loop>
            <source src="./assets/back.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <main>
        <div class="game-container">
            <?php
            // Database connection details
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gamers_profile";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch game titles and images
            $sql = "SELECT title, image FROM games";
            if ($result = $conn->query($sql)) {
                // Check if there are results and display them
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="game-box">';
                        $imagePath = realpath('./assets/' . $row["image"]);
                        if ($imagePath && file_exists($imagePath)) {
                            echo '<a href="./pages/games.php?title=' . urlencode($row["title"]) . '">';
                            echo '<img src="./assets/' . $row["image"] . '" alt="' . $row["title"] . '">';
                            echo '</a>';
                        } else {
                            echo '<p>Image not found</p>';
                        }
                        echo '<h3>' . $row["title"] . '</h3>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No games found</p>';
                }
                $result->free();
            } else {
                echo '<p>Error executing query: ' . $conn->error . '</p>';
            }
            // Close the database connection
            $conn->close();
            ?>
        </div>
    </main>
</body>

</html>