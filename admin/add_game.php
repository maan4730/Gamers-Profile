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

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $game_name = $_POST['game_name'];
    $game_image = $_FILES['game_image']['name'];
    $target_dir = "../assets/";
    $target_file = $target_dir . basename($game_image);

    // Upload file
    if (move_uploaded_file($_FILES['game_image']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO games (title, image) VALUES ('$game_name', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            $message = "New game added successfully";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $message = "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Game</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            width: 100%;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            margin-bottom: 20px;
            color: green;
        }
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }
            input[type="text"], input[type="file"], input[type="submit"] {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        
        <h2>Add New Game</h2>
        <?php if ($message != ""): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="add_game.php" method="post" enctype="multipart/form-data">
            <label for="game_name">Game Name:</label>
            <input type="text" id="game_name" name="game_name" required>
            <label for="game_image">Game Image:</label>
            <input type="file" id="game_image" name="game_image" required>
            <input type="submit" value="Add Game">
        </form>
    </div>
</body>
</html>