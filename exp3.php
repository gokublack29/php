<?php
function fibonacci($n) {
    if ($n <= 0) return [];
    if ($n == 1) return [0];
    if ($n == 2) return [0, 1];
    
    $fib = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fib[$i] = $fib[$i-1] + $fib[$i-2];
    }
    return $fib;
}

$count = 10;
$fibSeries = fibonacci($count);

echo "<h2>Fibonacci Series (First $count numbers):</h2>";
echo implode(", ", $fibSeries);
?>
