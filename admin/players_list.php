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

// Fetch players from the database
$sql = "SELECT players.*, games.title FROM players JOIN games ON players.game_id = games.id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Players List</h1>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Profile Image</th>
                        <th>Game ID</th>
                        <th>UID</th>
                        <th>Rank</th>
                        <th>Type</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                    
                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                            <td><img src="../assets/<?php echo htmlspecialchars($row['profile_image']); ?>" alt="Profile Image" style="width:50px;height:50px;"></td>
                            <td><?php echo htmlspecialchars($row['game_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['uid']); ?></td>
                            <td><?php echo htmlspecialchars($row['rank']); ?></td>
                            <td><?php echo htmlspecialchars($row['type']); ?></td>
                            <td><?php echo htmlspecialchars($row['time']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No players found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>