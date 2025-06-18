<?php
require('connect.php');

if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    
    $query = "DELETE FROM schools WHERE id = $id";
    $result = mysqli_query($connect, $query);
    
    if($result) {
        header("Location: index.php");
    }
}
?>