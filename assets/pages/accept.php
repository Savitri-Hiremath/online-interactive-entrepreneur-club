<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funding Application Accepted</title>
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

        .meeting-schedule {
            margin-top: 20px;
        }

        input[type="date"] {
            padding: 10px;
            margin-top: 10px;
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
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Funding Application Accepted</h1>

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

        $state = 'accept';
        $meetingDate = date('Y-m-d');  

        $insertSql = "INSERT INTO results (investor, startup, state, date) VALUES ('$username', '$startupName', '$state', '$meetingDate')";
        $insertResult = $conn->query($insertSql);

        if ($insertResult) {
            echo '<h2>Thank you for choosing ' . $startupName . ', ' . $username . '</h2>';
            echo '<div class="meeting-schedule">';
            echo '<label for="meetingDate">Scheduled Meeting Date: ' . $meetingDate . '</label>';
            echo '</div>';
        } else {
            echo '<h2>Failed to store data</h2>';
        }

        $conn->close();
    } else {
        echo '<h2>Invalid request</h2>';
    }
    ?>

    <div class="meeting-schedule">
        <label for="meetingDate">Choose a new meeting date:</label>
        <input type="date" id="meetingDate" name="meetingDate" required>

        <button onclick="scheduleMeeting()">Schedule Meeting</button>
    </div>
</div>

<script>
    function scheduleMeeting() {
        var selectedDate = document.getElementById('meetingDate').value;
        var username = '<?php echo isset($_GET["enteredUsername"]) ? $_GET["enteredUsername"] : ""; ?>';

        if (selectedDate !== "") {
            alert('Thank you! Your meeting is scheduled on ' + selectedDate);
            window.location.href = 'investorview.php?username=' + encodeURIComponent(username);
        } else {
            alert('Please choose a meeting date before scheduling.');
        }
    }
</script>
</body>
</html>