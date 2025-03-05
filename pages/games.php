<?php
// Include database connection
include 'db.php';

// Check if a specific game title is provided in the URL
if (isset($_GET['title'])) {
    $game_title = $conn->real_escape_string($_GET['title']);
    $sql = "SELECT players.player_id, players.profile_image, players.uid, players.rank, players.type, players.time, games.title 
        FROM players 
        JOIN games ON players.game_id = games.id 
        WHERE games.title = '$game_title'";
} else {
    // Fetch all players and their corresponding game titles from the database
    $sql = "SELECT players.player_id, players.profile_image, players.uid, players.rank, players.type, players.time, games.title 
        FROM players 
        JOIN games ON players.game_id = games.id";
}

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($player = $result->fetch_assoc()) {
        echo '<div class="player">';
        echo '<div class="box">';
        echo '<a href="games.php?title=' . urlencode($player['title']) . '">';
        echo '<img src="../assets/' . htmlspecialchars($player['profile_image']) . '" alt="' . htmlspecialchars($player['uid']) . '">';
        echo '</div>';
        echo '<div class="player-info">';
        echo '<p>UID: ' . htmlspecialchars($player['uid']) . '</p>';
        echo '<p>Rank: ' . htmlspecialchars($player['rank']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($player['type']) . '</p>';
        echo '<p>Time: ' . htmlspecialchars($player['time']) . '</p>';
        echo '<p>Game: ' . htmlspecialchars($player['title']) . '</p>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }
} else {
    echo "No players found.";
}
?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
        display: flex;
        justify-content: space-evenly;
    }
    .player {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        width: 600px;
        height: 200px;
        margin: 10px;
        text-align: left;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        
    }

    .player:hover {
        transform: scale(1.05);
    }

    .player img {
        width: 450px;
        border-radius: 5px;
        margin-right: 20px;
    }

    .player-info {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
    }

    .player p {
        margin: 5px 0;
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>
