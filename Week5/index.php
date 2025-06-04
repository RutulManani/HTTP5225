<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Display</title>
</head>
<body>
    <?php
    $connect = mysqli_connect('localhost', 'root', '', 'colors');

    if(!$connect){
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = 'SELECT * FROM colors';
    $colors = mysqli_query($connect, $query);

    if($colors){
        
        foreach($colors as $color){
            echo '<div style="background:' . $color['Hex'] . '; padding:25px; color:black; margin-bottom:15px;">' . $color['Name'] . '</div>';
        }
    }
    ?>
</body>
</html>