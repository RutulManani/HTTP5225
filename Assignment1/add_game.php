<?php
// Start the session (if needed)
session_start();

// Database connection
$connect = mysqli_connect('localhost', 'root', '', 'video_games_db');

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if (isset($_POST['AddGame'])) {
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $developer = mysqli_real_escape_string($connect, $_POST['developer']);
    $release_date = mysqli_real_escape_string($connect, $_POST['release_date']);
    $genre = mysqli_real_escape_string($connect, $_POST['genre']);
    $price = floatval($_POST['price']);
    $rating = intval($_POST['rating']);
    $multiplayer = in_array($_POST['multiplayer'], ['Yes', 'No']) ? $_POST['multiplayer'] : 'No';
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $cover_image = mysqli_real_escape_string($connect, $_POST['cover_image']);

    $query = "INSERT INTO games (title, developer, release_date, genre, price, rating, multiplayer, description, cover_image) 
              VALUES ('$title', '$developer', '$release_date', '$genre', $price, $rating, '$multiplayer', '$description', '$cover_image')";

    if (mysqli_query($connect, $query)) {
        $_SESSION['message'] = "Game added successfully!";
        header("Location: games.php");
        exit();
    } else {
        $error = "Error: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .success {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Game</h1>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form action="add_game.php" method="POST">
            <div class="form-group">
                <label for="title">Game Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            
            <div class="form-group">
                <label for="developer">Developer:</label>
                <input type="text" id="developer" name="developer" required>
            </div>
            
            <div class="form-group">
                <label for="release_date">Release Date:</label>
                <input type="date" id="release_date" name="release_date" required>
            </div>
            
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price ($):</label>
                <input type="number" step="0.01" id="price" name="price" required>
            </div>
            
            <div class="form-group">
                <label for="rating">Rating:</label>
                <select id="rating" name="rating" required>
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5" selected>5 Stars</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="multiplayer">Multiplayer:</label>
                <select id="multiplayer" name="multiplayer" required>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4"></textarea>
            </div>
            
            <div class="form-group">
                <label for="cover_image">Cover Image URL:</label>
                <input type="text" id="cover_image" name="cover_image">
            </div>
            
            <input type="submit" name="AddGame" value="Add Game">
        </form>
    </div>
</body>
</html>