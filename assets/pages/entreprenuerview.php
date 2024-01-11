<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
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

        h1, h2, h3 {
            color: #333;
        }

        .result-block {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            position: relative;
        }

        .congratulations-message {
            color: green;
        }

        .rejection-message {
            color: red;
        }

        #thankYouMessage {
            margin-top: 20px;
        }

        #fundingSectionButton {
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

        #fundingSectionButton:hover {
            background-color: #555;
        }

        .standard-message {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
   

    <?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "entrepreneurclub";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $enteredUsername = $_GET['username'];
    $resultSql = "SELECT * FROM results WHERE startup = '$enteredUsername'";
    $resultResult = $conn->query($resultSql);

    if ($resultResult->num_rows > 0) {
        echo '<h1>Results for ' . $enteredUsername . '</h1>';
        while ($resultRow = $resultResult->fetch_assoc()) {
            echo '<div class="result-block">';
            echo '<h3>Result Details</h3>';
            echo '<p>Investor: ' . $resultRow['investor'] . '</p>';
            echo '<p>State: ' . $resultRow['state'] . '</p>';

            if ($resultRow['state'] == 'accept') {
                echo '<p class="congratulations-message">Congratulations! Investor has accepted your application. Meeting is scheduled on this date: ' . $resultRow['date'] . '</p>';
            } elseif ($resultRow['state'] == 'decline') {
                echo '<p class="rejection-message">Sorry, better luck next time. Investor has declined your application.</p>';
            }

            echo '</div>';
        }
        echo '<p id="thankYouMessage">Thank you for using our platform!</p>';
        echo '<button id="fundingSectionButton" onclick="redirectToSection()">Funding Section</button>';
    } else {
        echo '<p class="standard-message">Sit back and relax while we update your results.</p>';
        echo '<p id="thankYouMessage">Thank you for using our platform!</p>';
        echo '<button id="fundingSectionButton" onclick="redirectToSection()">Funding Section</button>';
    }

    $conn->close();
    ?>

    <script>
        function redirectToSection() {
            window.location.href = 'section.php';
        }
    </script>
</div>

</body>
</html>