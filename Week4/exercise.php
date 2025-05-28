<?php

function getUsers() {
    $url = "https://jsonplaceholder.typicode.com/users";
    $data = file_get_contents($url);
    return json_decode($data, true);
}

$users = getUsers();

if ($users) {
    echo "<p>User List</p>";
    echo "<table border='1'>";
    
    for ($i = 0; $i < count($users); $i++) {
        $user = $users[$i];
        echo "<tr>";
        echo "<td>" . $user['id'] . "</td>";
        echo "<td>" . $user['name'] . "</td>";
        echo "<td>" . $user['username'] . "</td>";
        echo "<td>" . $user['email'] . "</td>";
        echo "<td>" . $user['address']['city'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "<p>Failed, Please try again later.</p>";
}
?>