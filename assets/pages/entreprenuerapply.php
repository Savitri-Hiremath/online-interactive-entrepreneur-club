<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund-seeking Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .container {
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input, textarea {
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
            width: 100%;
        }

        .password-toggle button {
            position: absolute;
            top: 50%;
            right: 10px;
            bottom:10px;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            outline: none;
        }

        button {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

    </style>
</head>
<body>
  <?php
    

    $id = isset($_GET['ID']) ? $_GET['ID'] : '';
    $name = isset($_GET['Name']) ? $_GET['Name'] : '';
  ?>
   
   <div class="container">
        <h1 style="text-align: center;">Fund Seeking Application</h1>
        
        <form action="databaseE.php" method="post" enctype="multipart/form-data" onsubmit="return validatePassword()">
            <div class="form-group">
                <label for="id">Investor ID:</label>
                <input type="text" id="id" name="id" value="<?php echo $id;?>">
            </div>
            <div class="form-group">
                <label for="name">Investor Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $name;?>">
            </div>

            <div class="form-group">
                <label for="startupName">Startup Name:</label>
                <input type="text" id="startupName" name="startupName" required>
            </div>

            <div class="form-group">
                <label for="startupDomain">Startup Domain:</label>
                <input type="text" id="startupDomain" name="startupDomain" required>
            </div>

            <div class="form-group">
                <label for="businessModel">Business Model:</label>
                <textarea id="businessModel" name="businessModel" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="usp">Unique Selling Proposition (USP):</label>
                <textarea id="usp" name="usp" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="targetMarket">Target Market:</label>
                <input id="targetMarket" name="targetMarket" rows="4" required>
            </div>

            <div class="form-group">
                <label for="revenue2020">Revenue 2020 ($):</label>
                <input type="number" id="revenue2020" name="revenue2020" required>
            </div>

            <div class="form-group">
                <label for="revenue2021">Revenue 2021 ($):</label>
                <input type="number" id="revenue2021" name="revenue2021" required>
            </div>

            <div class="form-group">
                <label for="revenue2022">Revenue 2022 ($):</label>
                <input type="number" id="revenue2022" name="revenue2022" required>
            </div>

            <div class="form-group">
                <label for="revenue2023">Revenue 2023 ($):</label>
                <input type="number" id="revenue2023" name="revenue2023" required>
            </div>

            
            <div class="form-group">
                <label for="expense2023">Expense 2023 ($):</label>
                <input type="number" id="expenses2023" name="expense2023" required>
            </div>


            </script>
            <div class="form-group">
            <label for="profit">Profit%:</label>
                <input type="number" id="profit" name="profit" required >
            </div>

            <div class="form-group">
                <label for="pitchVideo">Pitch Video (Only video files):</label>
                <input type="file" id="pitchVideo" name="pitchVideo" accept="video/*" required>
            </div>

            <div class="form-group password-toggle">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="button" onclick="togglePasswordVisibility()">👁‍🗨</button>
            </div>

            <button type="submit">Submit Funding Application</button>
            </form>
            </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var toggleButton = document.querySelector('.password-toggle button');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.textContent = '👁‍🗨';
            } else {
                passwordInput.type = 'password';
                toggleButton.textContent = '👁‍🗨';
            }
        }

        
       


        function validatePassword() {
            var password = document.getElementById('password').value;
            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;

            if (!passwordRegex.test(password)) {
                alert('Password must include at least one uppercase letter, one lowercase letter, one digit, and one symbol.');
                return false;
            }

            return true;
        }

    </script>

</body>
</html>