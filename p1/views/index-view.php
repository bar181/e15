<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E15 Project 1 - Bradley Ross</title>
</head>

<body>
    <h1>E15 Project 1</h1>
    <h2>Bradley Ross</h2>

    <p>
        Is palindrome: <?php echo $q1Results['input'] ?> =>
        <?php if ($q1Results['result']) { ?>
        YES
        <?php } else { ?>
        No
        <?php } ?>
    </p>

    <p>
        Vowel count: <?php echo $q2Results['input'] ?> => <?php echo $q2Results['result'] ?>
    </p>

    <p>
        <button onClick="window.location.reload();">Refresh Page</button>
    </p>





</body>

</html>