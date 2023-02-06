<?php

# route "/"


// select random word

// hard coded inputs - use random from course examples

// palindrome inputs (inputWord is fake user input)
$palindromeExamples = array("racecar", "Racecar", "racecar!","!racecar!","Hello World");
$random_key = array_rand($palindromeExamples);
$inputWord = $palindromeExamples[$random_key];


// sentence for vowel inputs (inputVowel is fake user input)
$vowelExamples[] = "the quick brown fox jumps over the lazy dog";
$vowelExamples[] = "Hll Wrld";
$vowelExamples[] = "AeIoU";
$random_key = array_rand($vowelExamples);
$inputVowel = $vowelExamples[$random_key];


require 'controllers/indexController.php';