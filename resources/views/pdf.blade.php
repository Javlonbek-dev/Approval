<?php
$base_price = 8500000;
$currant_pracent=55
$prices = [];

for ($i = 1; $i <= 85; $i++) {
    if ($i <= 5) {
        $prices[$i] = $base_price;
    } else {
        $percentage = 25 + ($i - 1);
        $prices[$i] = ($base_price * $percentage) / 25.0;
    }
}

print_r($prices);
?>
