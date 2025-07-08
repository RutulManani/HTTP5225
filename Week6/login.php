<?php
include('connect.php');

$email = $_POST['email'];
$password = md5($_POST['password']);

  
if(isset($_POST['login'])) {
    
    $query = 'SELECT * FROM users WHERE email = "'. $email . '" .
    AND
    WHERE password = "'. $password . '"';


$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result)){
   //Logged in 
   $record mysqli_fetch_assoc($result);
   $_SESSION['id'] = $record['id'];
   $_SESSION['name'] = $record['name'];
   header('Location: index.php');
   die();
}
else{
    //not logged in
    header('Location: login.php');
    die();
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
   <form action="login.php" method="POST">
    <input type="text" name="email"> 
    <input type="password" name="password"> 
    <input type="submit" name="login">
</form>
</body>
</html>