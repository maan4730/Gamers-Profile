<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            height: 100vh;
            background-color: #f0f2f5;
        }

        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            box-sizing: border-box;
            transition: width 0.3s;
        }

        .sidebar:hover {
            width: 300px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            padding: 15px;
            cursor: pointer;
            border-bottom: 1px solid #444;
            transition: background-color 0.3s, padding-left 0.3s;
        }

        .sidebar li:hover {
            background-color: #444;
            padding-left: 25px;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            box-sizing: border-box;
            background-color: #fff;
            overflow-y: auto;
            transition: background-color 0.3s;
        }

        .content section {
            display: none;
        }

        .content section.active {
            display: block;
        }

        .content h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .content form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content form label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .content form input,
        .content form textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .content form input:focus,
        .content form textarea:focus {
            border-color: #28a745;
        }

        .content form input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .content form input[type="submit"]:hover {
            background-color: #218838;
        }

        .content ul {
            list-style: none;
            padding: 0;
        }

        .content ul li {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        .content ul li img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .content ul li:hover {
            background-color: #f0f2f5;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <ul>
        <li data-section="gameList"><a href="dashboard.php">Game List</a></li>
        <li data-section="playerlist"><a href="players_list.php">Players List</a></li>
        <li data-section="addGame"><a href="add_game.php">Add Game</a></li>
        <li data-section="players"><a href="add_player.php">Add Players</a></li>
    </ul>
</div>

<div class="content">

    <section id="gameList" class="active">
        <h2>Game List</h2>
        <p>Here's a list of games:</p>
        <?php
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'gamers_profile');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch games from the database
        $sql = "SELECT title, image FROM games";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<ul>';
            while ($row = $result->fetch_assoc()) {
                echo '<li>';
                echo '<img src="../assets/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '">';
                echo htmlspecialchars($row['title']);
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No games found.</p>';
        }

        // Close connection
        $conn->close();
        ?>
    </section>

    <section id="players">
        <h2>Players</h2>
        <p>Current Players:</p>
        <ul>
            <li>Player 1</li>
            <li>Player 2</li>
            <li>Player 3</li>
        </ul>
    </section>

</div>

<script>
const sidebarItems = document.querySelectorAll('.sidebar li');
const contentSections = document.querySelectorAll('.content section');

sidebarItems.forEach(item => {
    item.addEventListener('click', () => {
        const sectionId = item.getAttribute('data-section');

        // Hide all sections
        contentSections.forEach(section => {
            section.classList.remove('active');
        });

        // Show the selected section
        const selectedSection = document.getElementById(sectionId);
        if (selectedSection) {
            selectedSection.classList.add('active');
        }
    });
});

// Select the first list item to show the initial content
sidebarItems[0].click();
</script>

</body>
</html>
