<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Funding Applications</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 50%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }

        .application-block {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            position: relative;
        }

        h1 {
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h3 {
            color: #333;
        }

        video {
            width: 100%;
            height: 400px;
            object-fit: cover;
            margin-top: 10px;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .action-buttons button {
            cursor: pointer;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 15px;
            transition: background-color 0.3s ease;
        }

        .action-buttons button:hover {
            background-color: #555;
        }

        .action-buttons button:active {
            background-color: black;
        }

        .action-buttons button.accept:hover {
            background-color: green;
        }

        .action-buttons button.decline:hover {
            background-color: red;
        }

        .recommendations-button {
            cursor: pointer;
            background-color: black;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 15px;
            transition: background-color 0.3s ease;
        }

        .recommendations-button:hover {
            background-color: #333;
        }

        .recommendations-button:active {
            background-color: #000;
        }

        .green-background {
            background-color: lightgreen;
        }

        .red-background {
            background-color: lightcoral;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>
            <span>Funding Applications</span>
            <button onclick="viewRecommendations()" class="recommendations-button">Recommendation</button>
        </h1>

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

        $entrySql = "SELECT * FROM entry WHERE Name = '$enteredUsername'";
        $entryResult = $conn->query($entrySql);

        $stateSql = "SELECT * FROM results WHERE investor = '$enteredUsername'";
        $stateResult = $conn->query($stateSql);

        $startupStates = [];
        while ($stateRow = $stateResult->fetch_assoc()) {
            $startupStates[$stateRow['startup']] = $stateRow['state'];
        }

        if ($entryResult->num_rows > 0) {
            while ($row = $entryResult->fetch_assoc()) {
                $state = isset($startupStates[$row['StartupName']]) ? $startupStates[$row['StartupName']] : 'not found';
                $colorClass = '';

                if ($state == 'accept') {
                    $colorClass = 'green-background';
                } elseif ($state == 'decline') {
                    $colorClass = 'red-background';
                }

                echo '<div class="application-block ' . $colorClass . '">';
                echo '<h3>Funding Application Details</h3>';
                echo '<h3><a href="investorview.php?username=' . urlencode($enteredUsername) . '&startupName=' . urlencode($row['StartupName']) . '" style="color: black; text-decoration: none;">' . $row['StartupName'] . '</a></h3>';
                echo '<p>Startup Domain: ' . $row['StartupDomain'] . '</p>';
                echo '<p>Business Model: ' . $row['BusinessModel'] . '</p>';
                echo '<p>Target Market: ' . $row['TargetMarket'] . '</p>';
                echo '<p>Revenue 2022: ' . $row['Revenue2022'] . '</p>';
                echo '<p>Revenue 2023: ' . $row['Revenue2023'] . '</p>';
                echo '<p>Profit: ' . $row['Profit'] . '%</p>';
                echo '<video controls>';
                echo '<source src="' . $row['PitchVideo'] . '" type="video/mp4">';
                echo 'Your browser does not support the video tag.';
                echo '</video>';    
                echo '<div class="action-buttons">';
                echo '<button class="accept" onclick="acceptApplication(\'' . $row['StartupName'] . '\', \'' . $enteredUsername . '\')">Accept</button>';
         echo '<button class="decline" onclick="declineApplication(\'' . $row['StartupName'] . '\', \'' . $enteredUsername . '\')">Decline</button>';
        echo '</div>';
                echo '</div>';
            }
        } else {
            echo "No funding applications found.";
        }

        $conn->close();
        ?>

<script>
    function acceptApplication(startupName, enteredUsername) {
        window.location.href = 'accept.php?startupName=' + encodeURIComponent(startupName) + '&enteredUsername=' + encodeURIComponent(enteredUsername);
    }

    function declineApplication(startupName, enteredUsername) {
        window.location.href = 'decline.php?startupName=' + encodeURIComponent(startupName)+ '&enteredUsername=' + encodeURIComponent(enteredUsername);
    }

    function viewRecommendations() {
        window.location.href = 'table.php';
    }
</script> 
</div>
</body>
</html>