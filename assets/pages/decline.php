<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funding Application Declined</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            width: 50%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
        }

        h1, h2 {
            color: #333;
        }

        .message {
            margin: 20px 0;
        }

        .thank-you-message {
            margin-top: 20px;
        }

        button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Funding Application Declined</h1>

    <?php
    if (isset($_GET['startupName']) && isset($_GET['enteredUsername'])) {
        $startupName = $_GET['startupName'];
        $username = $_GET['enteredUsername'];

        $servername = "127.0.0.1";
        $db_username = "root";
        $db_password = "";
        $db_name = "entrepreneurclub";  

        $conn = new mysqli($servername, $db_username, $db_password, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $state = 'decline';
        $meetingDate = date('Y-m-d');

        $insertSql = "INSERT INTO results (investor, startup, state, date) VALUES ('$username', '$startupName', '$state', '$meetingDate')";
        $insertResult = $conn->query($insertSql);

        if ($insertResult) {
            echo '<h2>Sorry, ' . $startupName . ' application did not interest you ' . $username . ' </h2>';
        } else {
            echo '<h2>Failed to store data</h2>';
        }

        $conn->close();
    } else {
        echo '<h2>Invalid request</h2>';
    }
    ?>

    <p class="thank-you-message">Thank you for your time!</p>
    <button onclick="redirectToInvestor()">Back to Investor Page</button>
</div>

<script>
    function redirectToInvestor() {
        var username = '<?php echo isset($_GET["enteredUsername"]) ? $_GET["enteredUsername"] : ""; ?>';
        window.location.href = 'investorview.php?username=' + encodeURIComponent(username);
    }
</script>

</body>
</html>