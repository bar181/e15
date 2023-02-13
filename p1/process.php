<?php

session_start();

# design preference - objectives at top followed by functions

# evaluate variables based on user form input (call function for each)
$word = $_POST['word'];
$palindrome = isPalindrome($word);
$vowels = countVowels($word);
$shift = letterShift($word);


# --------------- HELPER FUNCTIONS ---------------

# return true if word is a palindrome
# process -> loop through 50% of string, return false if 1st/last letter do not match
# special -> ignore numbers and special characters
# sources (see readme) -> regex, strtolower
# testing -> "racecar!" => Yes; "Hello World" => No
function isPalindrome($inputWord): bool
{
    # string to array - ignore special character
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


# return number of vowels in word
# process -> loop through each letter and check if in array of vowels
# special -> vowels: a,e,i,o,u; cASE inSensitive
# testing -> "Hll Wrld" => 0; "AeIoU" => 5
function countVowels($inputWord): int
{
    # defaults and initializations
    $vowelCount = 0;
    $inputWordArray = str_split($inputWord);
    $vowelArray = array("a", "e", "i", "o", "u");

    # increment vowel counter if letter is a vowel
    foreach ($inputWordArray as $letter) {
        $vowelCount += in_array(strtolower($letter), $vowelArray);
    }
    return $vowelCount;
}


# Shift each letter in a word +1 position in the alphabet
# process -> loop through each letter and check if in array of vowels
# special -> Capitalization retained; ignore special character
# testing -> "foobar@1" => "gppcbs@1"; "aAb" => "bBc"
function letterShift($inputWord): string
{
    $inputWordArray = str_split($inputWord);
    $returnWordArray = [];

    # call function that shifts each letter in array
    foreach ($inputWordArray as $letter) {
        $returnWordArray[] = getShiftedLetter($letter);
    }
    return implode("", $returnWordArray);
}


# Shifts a single letter forward in alphabet
# process -> hard coded shift +1 in ASCII
# future use case -> for Ceasar shift, $shift = a new input (e.g. $shift = 4)
#       use modulo operator instead of magic numbers for edge cases
# special -> Capitalization retained; ignore special character
# edge cases -> Z - use magic numbers to revert to A
# sources (see readme) ->chr, ord, regex
# testing -> "a" => "b"; "Z" => "A
function getShiftedLetter($letter): string
{
    if (preg_replace("/[^a-z]/", '', $letter)) {
        $letterInt = ord($letter) - ord('a');
        $shift = ($letter != 'z') ? 1 : -25;
        return  chr($letterInt + ($shift) +  ord('a'));
    }

    if (preg_replace("/[^A-Z]/", '', $letter)) {
        $letterInt = ord($letter) - ord('A');
        $shift = ($letter != 'Z') ? 1 : -25;
        return   chr($letterInt + ($shift) +  ord('A'));
    }

    return $letter;
}

# Update session with results
$_SESSION['results'] = [
        'word' => $word,
        'palindrome' => $palindrome,
        'vowels' => $vowels,
        'shift' => $shift,
    ];


header('Location: index.php');