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

// Fetch game names from the games table
$games_sql = "SELECT id, title FROM games";
$games_result = $conn->query($games_sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $profile_image = $_FILES["profile_image"]["name"];
    $game_id = isset($_POST["game_id"]) ? $_POST["game_id"] : null;
    $uid = $_POST["uid"];
    $rank = $_POST["rank"];
    $type = $_POST["type"];
    $time = $_POST["time"];

    // Upload profile image
    $target_dir = "../assets/";
    $target_file = $target_dir . basename($profile_image);
    move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);

    // Validate game_id
    if ($game_id === null || !is_numeric($game_id)) {
        die("Invalid game ID.");
    }

    // Insert data into database
    $sql = "INSERT INTO players (profile_image, game_id, uid, rank, type, time) VALUES ('$profile_image', $game_id, '$uid', '$rank', '$type', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "New player added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Player</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        
    </style>
</head>

<body>
    <div class="container">
        <h2>Add Player</h2>
        <form action="add_player.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="profile_image">Profile Image:</label>
                <input type="file" id="profile_image" name="profile_image" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="game_id">Game Name:</label>
                <select id="game_id" name="game_id" class="form-control" required>
                    <option value="">Select Game</option>
                    <?php
                    if ($games_result->num_rows > 0) {
                        while ($row = $games_result->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["title"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="uid">UID:</label>
                <input type="text" id="uid" name="uid" required>
            </div>
            <div class="form-group">
                <label for="rank">Rank:</label>
                <input type="text" id="rank" name="rank" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" id="type" name="type" required>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="text" id="time" name="time" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Player</button>
        </form>
    </div>
</body>

</html>