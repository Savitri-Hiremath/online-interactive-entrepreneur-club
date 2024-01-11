<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            width: 300px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #666;
        }

        input, select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .password-toggle {
            position: relative;
        }

        .password-toggle input {
            padding-right: 30px;
        }

        .password-toggle button {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
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
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Investor Name/ StartUp Name:</label>
            <input type="text" id="username" name="username" required>

            <label for="password" class="password-toggle">Password:
                <input type="password" id="password" name="password" required>
                <button type="button" onclick="togglePassword()">👁‍🗨</button>
            </label>

            <label for="userType">User Type:</label>
            <select id="userType" name="userType" required>
                <option value="" selected disabled>---Select---</option>
                <option value="entrepreneur">Entrepreneur</option>
                <option value="investor">Investor</option>
            </select>

            <button type="button" id="submitBtn" onclick="submitForm()">Submit</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById('password');
            var passwordToggle = document.querySelector('.password-toggle button');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.textContent = '👁‍🗨';
            } else {
                passwordInput.type = 'password';
                passwordToggle.textContent = '👁‍🗨';
            }
        }

        function submitForm() {
            document.getElementById('submitBtn').type = 'submit';
            document.forms[0].submit();
        }
    </script>

    <?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "entrepreneurclub"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $enteredUsername = $_POST['username'];
        $enteredPassword = $_POST['password'];
        $enteredUserType = $_POST['userType'];

        if ($enteredUsername === 'Admin' && password_verify($enteredPassword, password_hash('Entry16?', PASSWORD_DEFAULT))) {
            header('Location: display.php');
            exit();
        }

        if ($enteredUserType === 'entrepreneur') {
            $query = "SELECT Password FROM entry WHERE StartupName = '$enteredUsername'";
            $redirectPage = 'entreprenuerview.php?username=' . urlencode($enteredUsername);
        } elseif ($enteredUserType === 'investor') {
            $query = "SELECT Password FROM funding WHERE Name = '$enteredUsername'";
            $redirectPage = 'investorview.php?username=' . urlencode($enteredUsername);
        } else {
            echo '<script>alert("Invalid user type!");</script>';
            exit();
        }

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedHashedPassword = $row['Password'];

            if (password_verify($enteredPassword, $storedHashedPassword)) {
                header("Location: $redirectPage");
                exit();
                
            } else {
                echo '<script>alert("Invalid password!");</script>';
            }
        } else {
            echo '<script>alert("Invalid username!");</script>';
        }
    }
    $conn->close();
    ?>
</body>
</html>