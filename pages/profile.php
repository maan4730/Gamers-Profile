<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Gamer's Profile Manager</title>
    <style>
        /* Example CSS from login page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .profile-btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        }
        .profile-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Your Profile</h1>
        <form action="save_profile.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="profile_image">Profile Image:</label>
                <input type="file" id="profile_image" name="profile_image" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="game_name">Game Name:</label>
                <input type="text" id="game_name" name="game_name" required>
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
            <button type="submit" class="profile-btn">Save Profile</button>
        </form>
    </div>
</body>
</html>
