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

// Get the game title from the URL
$game_title = isset($_GET['title']) ? $_GET['title'] : '';

if ($game_title) {
    // SQL query to fetch player information by joining players and games tables
    $sql = "SELECT players.profile_image, players.uid, players.rank, players.type, players.time, games.title 
            FROM players 
            JOIN games ON players.game_id = games.id 
            WHERE games.title = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $game_title);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h1>Players for Game: " . htmlspecialchars($game_title) . "</h1>";
        echo "<div class='players-container'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='player-box'>";
            echo "<img src='../assets/" . htmlspecialchars($row['profile_image']) . "' alt='Profile Image'>";
            echo "<div class='player-details'>";
            echo "<p>UID: " . htmlspecialchars($row['uid']) . "</p>";
            echo "<p>Rank: " . htmlspecialchars($row['rank']) . "</p>";
            echo "<p>Type: " . htmlspecialchars($row['type']) . "</p>";
            echo "<p>Time: " . htmlspecialchars($row['time']) . "</p>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>No players found for this game.</p>";
    }
} else {
    echo "<p>Invalid game title.</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Players</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .players-container {
            display: flex;
            flex-direction: row;
            gap: 20px;
            flex-wrap: wrap;
        }
        .player-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 40vw;
            height: 40vh;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .player-box img {
            width: 210px;
            height: 250px;
        
        }
        .player-details {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            gap: 20px;
            font-size: 24px;
        }
    </style>
</head>
<body>
</body>
</html>