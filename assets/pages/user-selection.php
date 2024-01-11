
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Selection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        html, body {
            background: #6665ee;
            font-family: 'Poppins', sans-serif;
        }

        ::selection {
            color: #fff;
            background: #6665ee;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .container .form {
            background: #fff;
            padding: 30px 35px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .container .form form .form-control {
            height: 40px;
            font-size: 15px;
        }

        .container .form form .forget-pass {
            margin: -15px 0 15px 0;
        }

        .container .form form .forget-pass a {
            font-size: 15px;
        }

        .container .form form .button {
            background: #6665ee;
            color: #fff;
            font-size: 17px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .container .form form .button:hover {
            background: #5757d1;
        }

        .container .form form .link {
            padding: 5px 0;
        }

        .container .form form .link a {
            color: #6665ee;
        }

        .container .login-form form p {
            font-size: 14px;
        }

        .container .row .alert {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="" method="GET">
                    <h2 class="text-center" style="color:#00008B;font-family:cambria;font-size:300%"><b>NEXUS</b></h2>
                    <p class="text-center" style="color:#583759;font-family:Dishonorable Mention Comic Sans"><b>INNOVATE . CONNECT . THRIVE</b></p>
                    <h5 class="text-center">Select Your Role</h5>
                    <div class="form-group">
                        <label for="userType">User Type:</label>
                        <select name="userType" class="form-control" required onchange="updateFormAction(this)">
    <option value="user" data-action="signup">User</option>
    <option value="investor" data-action="login">Investor</option>
</select>

                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="submit" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
