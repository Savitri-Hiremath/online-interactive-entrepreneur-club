<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "entrepreneurclub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $investorName = mysqli_real_escape_string($conn, $_POST['investorName']);
    $investmentAmount = mysqli_real_escape_string($conn, $_POST['investmentAmount']);
    $investmentType = mysqli_real_escape_string($conn, $_POST['investmentType']);
    $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!is_numeric($investmentAmount)) {
        die("Error: Investment amount must be a number");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO funding (Name, Amount, FundingType, Deadline, Password) VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param("sssss", $investorName, $investmentAmount, $investmentType, $deadline, $hashedPassword);

    if ($stmt->execute()) {
        echo "<script>alert('Application submitted successfully!'); window.location.href='section.php';</script>";
    } else {
        echo "<script>alert('Application not submitted. Please try again.'); window.location.href='investor.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>