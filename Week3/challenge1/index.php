<?php

$time = rand(1, 23);

if ($time >= 5 && $time < 9) {
    $mealType = "Breakfast";
    $foodItem = "Bananas, Apples, and Oats";
} elseif ($time >= 12 && $time < 14) {
    $mealType = "Lunch";
    $foodItem = "Fish, Chicken, and Vegetables";
} elseif ($time >= 19 && $time < 21) {
    $mealType = "Dinner";
    $foodItem = "Steak, Carrots, and Broccoli";
} else {
    $mealType = "No meal time";
    $foodItem = "Animals are not being fed right now";
}

echo "<p>Random hour - $time:00</p>";
echo "<p>Meal - $mealType</p>";
echo "<p>Food - $foodItem</p>";
?>