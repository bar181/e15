<!doctype html>
<html lang='en'>

<head>
    <title>Mystery Word Scramble</title>
    <meta charset='utf-8'>
    <style>
    .correct {
        color: green;
    }

    .incorrect {
        color: red;
    }
    </style>
</head>

<body>

    <h1>Results</h1>
    <?php if ($correct) { ?>
    <div class='correct'> Correct </div>
    <?php } else { ?>
    <div class='incorrect'> Wrong </div>
    <?php } ?>


</body>

</html>