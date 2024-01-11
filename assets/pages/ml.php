<!-- ml.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ML Processing</title>
</head>
<body>
    <h1>ML Processing</h1>

    <?php
    $output = shell_exec('python mlscript.py');
    echo "<pre>$output</pre>";
    ?>
</body>
</html>