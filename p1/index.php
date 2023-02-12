<?php

session_start();

if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];

    $word = $results['word'];
    $palindrome = $results['palindrome'];
    $vowels = $results['vowels'];
    $shift = $results['shift'];
}


$_SESSION['results'] = null;


require 'index-view.php';

// $palindromeExamples = array("racecar", "Racecar", "racecar!","!racecar!","Hello World");


// $vowelExamples[] = "the quick brown fox jumps over the lazy dog";
// $vowelExamples[] = "Hll Wrld";
// $vowelExamples[] = "AeIoU";