<?php
//Question 6
$bakery = [
    "item" => "Cupcake",
    "count" => 20,
    "price" => "5.99"
];

foreach ($bakery as $key => $value) {
    echo "{$key}: {$value}";
    echo '<br>';
}
//Question 7
function calculateTotal(int $price, int $quantity = 5) : int {
    return $price * $quantity;
}
echo "<br>";
echo "Total is ";
echo calculateTotal(3);
echo "<br>";
echo "New Total is ";
echo calculateTotal(8,5);


