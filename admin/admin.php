

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Gamer's Profile Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            width: 100%;
            text-align: center;
        }
        .section {
            background-color: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
        }
        .section h2 {
            margin-bottom: 20px;
        }
        .section form input,
        .section form button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .section form button {
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .section form button:hover {
            background-color: #218838;
        }
        .section table {
            width: 100%;
            border-collapse: collapse;
        }
        .section table th,
        .section table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        .section table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Page</h1>
    </div>
    <div class="container">
        <!-- Add Games Section -->
        <div class="section">
            <h2>Add Game</h2>
            <form action="add_game.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Game Title" required>
                <input type="text" name="description" placeholder="Game Description" required>
                <input type="file" name="image" required>
                <button type="submit">Add Game</button>
            </form>
        </div>

        <!-- Game List Section -->
        <div class="section">
            <h2>Game List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "gamers_profile";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT title, description, image FROM games");
                        $stmt->execute();
                        $games = $stmt->fetchAll();

                        foreach ($games as $game) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($game['title']) . "</td>";
                            echo "<td>" . htmlspecialchars($game['description']) . "</td>";
                            echo "<td><img src='../assets/images/" . htmlspecialchars($game['image']) . "' alt='" . htmlspecialchars($game['title']) . "' width='50'></td>";
                            echo "</tr>";
                        }
                    } catch(PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Users Section -->
        <div class="section">
            <h2>Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = $conn->prepare("SELECT username, email FROM users");
                        $stmt->execute();
                        $users = $stmt->fetchAll();

                        foreach ($users as $user) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($user['username']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                            echo "</tr>";
                        }
                    } catch(PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>