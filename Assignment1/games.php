<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Games Database</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 3px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e9e9e9;
        }
        .rating {
            color: orange;
            font-weight: bold;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
        }
        .add-game-btn {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }
        .add-game-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Video Games Collection</h1>
    
    <?php
    // Database connection
    $connect = mysqli_connect('localhost', 'root', '', 'video_games_db');
    
    if(!$connect){
        die("<p style='color:red;'>Connection failed: " . mysqli_connect_error() . "</p>");
    }

    // Get all games from database sorted by ID
    $query = 'SELECT * FROM games ORDER BY id ASC';
    $games = mysqli_query($connect, $query);

    if(mysqli_num_rows($games) > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Developer</th>
                <th>Release Date</th>
                <th>Genre</th>
                <th>Price</th>
                <th>Rating</th>
                <th>Multiplayer</th>
            </tr>
            
            <?php while($game = mysqli_fetch_assoc($games)): ?>
                <tr>
                    <td><?= htmlspecialchars($game['id']) ?></td>
                    <td><?= htmlspecialchars($game['title']) ?></td>
                    <td><?= htmlspecialchars($game['developer']) ?></td>
                    <td><?= htmlspecialchars($game['release_date']) ?></td>
                    <td><?= htmlspecialchars($game['genre']) ?></td>
                    <td>$<?= number_format($game['price'], 2) ?></td>
                    <td class="rating">
                        <?= str_repeat('★', $game['rating']) ?><?= str_repeat('☆', 5 - $game['rating']) ?>
                    </td>
                    <td><?= htmlspecialchars($game['multiplayer']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        
        <a href="add_game.php" class="add-game-btn">Add New Game</a>
    <?php else: ?>
        <div class="no-data">
            <p>No games found in the database.</p>
            <a href="add_game.php" class="add-game-btn">Add Your First Game</a>
        </div>
    <?php endif;
    
    mysqli_close($connect);
    ?>
</body>
</html>