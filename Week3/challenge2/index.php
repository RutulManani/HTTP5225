<?php

$userInput = rand(1, 1000);

if ($userInput % 3 == 0 && $userInput % 5 == 0) {
    $magicNumber = "FizzBuzz";
} elseif ($userInput % 3 == 0) {
    $magicNumber = "Fizz";
} elseif ($userInput % 5 == 0) {
    $magicNumber = "Buzz";
} else {
    $magicNumber = $userInput;
}

echo "<p>Random User Input - $userInput</p>";
echo "<p>Magic Number - $magicNumber</p>";
?>