<?php


# Is palindrome
$q1Results['input'] = $inputWord;
$q1Results['result'] = isPalindrome($inputWord);

function isPalindrome($inputWord)
{
    # see source : regex, strtolower
    $cleanWord = strtolower(preg_replace("/[^a-zA-Z]/", "", $inputWord));
    $letterArray = str_split($cleanWord);
    $wordSize = sizeof($letterArray);

    # loop outermost then go inward (return false if they don't macth)
    for ($i=0; $i < ($wordSize /2); $i++) {
        if ($letterArray[$i] != $letterArray[($wordSize - $i - 1)]) {
            return false;
        }
    }
    return true;
}


# Vowel count
$q2Results['input'] = $inputVowel;
$q2Results['result'] = countVowels($inputVowel);

function countVowels($sentence)
{
    $vowelCount = 0;
    $sentenceArray = str_split($sentence);
    $vowelArray = array("a", "e", "i", "o", "u");

    # increment vowel counter if letter is a vowel
    foreach ($sentenceArray as $letter) {
        $vowelCount += in_array(strtolower($letter), $vowelArray);
    }
    return $vowelCount;
}


# Letter shift


$q3Results['input'] = 2;
$q3Results['result'] = 2;


require './views/index-view.php';