<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "entrepreneurclub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_POST['id']) ? $_POST['id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$startupName = isset($_POST['startupName']) ? $_POST['startupName'] : '';
$startupDomain = isset($_POST['startupDomain']) ? $_POST['startupDomain'] : '';
$businessModel = isset($_POST['businessModel']) ? $_POST['businessModel'] : '';
$usp = isset($_POST['usp']) ? $_POST['usp'] : '';
$targetMarket = isset($_POST['targetMarket']) ? $_POST['targetMarket'] : '';
$revenue2022 = isset($_POST['revenue2022']) ? $_POST['revenue2022'] : 0;
$revenue2023 = isset($_POST['revenue2023']) ? $_POST['revenue2023'] : 0;
$revenue2020 = isset($_POST['revenue2020']) ? $_POST['revenue2020'] : 0;
$revenue2021 = isset($_POST['revenue2021']) ? $_POST['revenue2021'] : 0;
$expenses2023 = isset($_POST['expenses2023']) ? $_POST['expenses2023'] : 0;
$profit = isset($_POST['profit']) ? $_POST['profit'] : 0;
$password = isset($_POST['password']) ? $_POST['password'] : '';

$targetDirectory = "C:/xampp/htdocs/eclub/assets/pages/pitch/";
$target = "http://localhost/pitch/";
$targetFile = $targetDirectory . basename($_FILES['pitchVideo']['name']);
$targetFile1 = $target . basename($_FILES['pitchVideo']['name']);
move_uploaded_file($_FILES['pitchVideo']['tmp_name'], $targetFile);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$checkQuery = "SELECT * FROM entry WHERE  Id = ? AND Name = ? AND StartupName = ?";
$checkResult = $conn->prepare($checkQuery);
$checkResult->bind_param("sss", $id, $name, $startupName);
$checkResult->execute();
$checkResult->store_result();

if ($checkResult->num_rows > 0) {
    echo "<script>alert('Application already submitted for this investment'); window.location.href='section.php';</script>";
    exit();
}

$sql = "INSERT INTO entry (ID, Name, StartupName, StartupDomain, BusinessModel, USP, TargetMarket, Revenue2020, Revenue2021, Revenue2022, Revenue2023, Expenses2023, Profit, PitchVideo, Password)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$insertStatement = $conn->prepare($sql);
$insertStatement->bind_param("sssssssssssssss", $id, $name, $startupName, $startupDomain, $businessModel, $usp, $targetMarket, $revenue2020, $revenue2021, $revenue2022, $revenue2023, $expenses2023, $profit, $targetFile1, $hashedPassword);
if ($insertStatement->execute()) {
    echo "<script>alert('Application submitted successfully!'); window.location.href='section.php';</script>";
} else {
    echo "Error: " . $insertStatement->error;
}

$insertStatement->close();
$conn->close();
?>