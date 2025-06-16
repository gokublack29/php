<?php
$indexedArray = [64, 34, 25, 12, 22, 11, 90];
echo "<h2>Original Indexed Array:</h2>";
print_r($indexedArray);

$sorted1 = $indexedArray;
sort($sorted1);
echo "<h3>After sort() - Ascending:</h3>";
print_r($sorted1);

$sorted2 = $indexedArray;
rsort($sorted2);
echo "<h3>After rsort() - Descending:</h3>";
print_r($sorted2);

$assocArray = [
    "John" => 85,
    "Alice" => 92,
    "Bob" => 78,
    "Carol" => 96
];

echo "<h2>Original Associative Array:</h2>";
print_r($assocArray);

$sortedAssoc1 = $assocArray;
asort($sortedAssoc1);
echo "<h3>After asort() - Sort by values:</h3>";
print_r($sortedAssoc1);

$sortedAssoc2 = $assocArray;
ksort($sortedAssoc2);
echo "<h3>After ksort() - Sort by keys:</h3>";
print_r($sortedAssoc2);
?>
