<?php
global $user;
?>
    <link href="assets/css/style.css" rel="stylesheet">
    <div class="login">
        <div class="col-4 bg-white border rounded p-4 shadow-sm">
            <form>
                <div class="d-flex justify-content-center">
                <h2 class="text-center" style="color:#00008B;font-family:cambria;font-size:300%"><b>NEXUS</b></h2></br>
                </div>
                <h1 class="h5 mb-3 fw-normal">Hello, <?=$user['firstname'].' '.$user['lastname']. ' ('.$user['email'].')'?>,</br>Your Account Is Blocked By Admin</h1>
                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <a href="assets/php/process.php?logout" class="btn btn-danger" type="submit">Logout</a>
                </div>
            </form>
        </div>
    </div>
