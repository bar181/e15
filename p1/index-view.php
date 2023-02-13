<!doctype html>
<html lang='en'>

<head>
    <title>E15 Project 1 - Bradley Ross</title>
    <meta charset='utf-8'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container text-center">
        <h1>E15 Project 1- String Processor</h1>
        <h2>Bradley Ross</h2>

        <div class="card col-6 mx-auto mt-5">
            <form method='POST' action='process.php' class="p-3">
                <h2 class="py-2">Let's Play !</h2>
                <div class="form-floating mb-3">
                    <input type='text' name='word' class="form-control" id='word' placeholder="Enter a String">
                    <label for='word'>Enter a String</label>
                </div>
                <button type='submit' class="btn btn-primary">Check answer</button>
            </form>
        </div>

        <?php if (isset($word)) { ?>
        <div class="card col-6 mx-auto mt-5 p-3">
            <h2>Results</h2>

            <div> You entered: <?php echo $word ?> </div>

            <div>
                Is Palindrome:
                <?php if ($palindrome) { ?>
                <span>Yes</span>
                <?php } else { ?>
                <span>No</span>
                <?php } ?>
            </div>

            <div>
                Vowel Count: <span><?php echo $vowels ?></span>
            </div>

            <div>
                Letter Shift: <span><?php echo $shift ?></span>
            </div>
        </div>
        <?php } ?>
    </div>
</body>

</html>