<?php

$students = array("Anu", "Kiran", "Zoya", "Rahul", "Deepa");


echo "<h3>Original Array:</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";


asort($students);
echo "<h3>Sorted Array (Ascending - asort):</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";


arsort($students);
echo "<h3>Sorted Array (Descending - arsort):</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";
?>