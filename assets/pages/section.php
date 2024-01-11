<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 100%;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            width: 50%;
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button.invest {
            background-color: black;
            color: white;
        }

        button.results {
            background-color: green;
            color: white;
        }

        button:hover {
            background-color: red;
        }

        .investment-block {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            width: 50%;
            background-color: white;
        }

        .investment-block h3 {
            margin-bottom: 5px;
        }
    </style>
   
  
</head>
<body>

    <div class="button-container">
 
        <button class="invest" type="button" onclick="directToInvestorForm()">Invest</button>
    <h2>FUNDING SECTION</h2>
        <button class="results" type="button" onclick="directToResults()">Results</button>
        
    </div>

    <?php
    
    $servername = "127.0.0.1"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "entrepreneurclub"; 


    $conn = new mysqli($servername, $username, $password, $dbname);

  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM funding";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo '<div class="investment-block">';
        echo '<h3>Investment Details</h3>';
        echo '<p>ID: ' . $row['ID'] . '</p>'; 
        echo '<p>Name: ' . $row['Name'] . '</p>';
        echo '<p>Funding Mode: ' . $row['Fundingtype'] . '</p>';
        echo '<p>Amount: ' . $row['Amount'] . '</p>';
        echo '<p>Deadline: ' . $row['Deadline'] . '</p>'; 
        echo '<button type="button" onclick="directToSeekForm(\'' . $row['ID'] . '\', \'' . $row['Name'] . '\')">Apply</button>';
        echo '</div>';
    }

    $conn->close();
    ?>

    <script>
        function directToInvestorForm() {
            window.location.href = 'investor.php';
        }

        function directToResults() {
            window.location.href = 'logininvestor.php';
        }
       
        function directToSeekForm(investorID, investorName) {
            window.location.href = 'entreprenuerapply.php?ID=' + investorID + '&Name=' + encodeURIComponent(investorName);
        }
    </script>

</body>
</html>