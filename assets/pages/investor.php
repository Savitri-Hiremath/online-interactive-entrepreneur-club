<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Application</title>
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
        }

        input, select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        .password-toggle button {
            position: absolute;
            top: 50%;
            right:1px;
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

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Investment Application Form</h1>
        
        <form id="investmentForm" action="databasei.php" method="post" onsubmit="return validatePassword();" autocomplete="off">
            <div class="form-group">
                <label for="investorName">Investor Name:</label>
                <input type="text" id="investorName" name="investorName" required>
            </div>

            <div class="form-group">
                <label for="investmentAmount">Amount ($):</label>
                <input type="number" id="investmentAmount" name="investmentAmount" required>
            </div>

            <div class="form-group">
                <label for="investmentType">Type:</label>
                <select id="investmentType" name="investmentType" required>
                    <option value="">-- Select --</option>
                    <option value="Loan">Loan</option>
                    <option value="Self">Self</option>
                </select>
            </div>

            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="date" name="deadline" required>
            </div>

            <div class="form-group password-toggle">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required autocomplete="new-password">
                <button type="button" onclick="togglePasswordVisibility()">👁‍🗨</button>
            </div>

            <button type="submit">Submit Application</button>
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
        }
    </script>

</body>
</html>