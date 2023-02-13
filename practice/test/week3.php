<?php

// Week 3 problems

// ternary operator
// $x = 99;
if (isset($x)) {
    $y = 1;
} else {
    $y = 2;
}
echo "<br>ternary: y" . $y;

$y = (isset($x)) ? 1 : 2;
echo "<br>ternary brad: y" . $y;


// // null coalescing operator
// if (isset($x)) {
//     $y = $x;
// } else {
//     $y = 1;
// }

// echo "<br>1: y" . $y;

// $y = $x ?? 1;
// echo "<br>1 Brad: y" . $y;

// echo "<br><br>";


// $x = 1;
// if (isset($x)) {
//     $y = $x;
// } else {
//     $y = 1;
// }

// echo "<br>2:  y" . $y;

// $y = $x ?? 1;
// echo "<br>2 Brad: y" . $y;