<?php
$conn = new mysqli("localhost", "root", "", "records_db");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $status = 0;

    $stmt = $conn->prepare("INSERT INTO users (name, age, status) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $age, $status);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: index.html");
    exit;
}
?>