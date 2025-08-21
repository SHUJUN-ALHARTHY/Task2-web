<?php
$conn = new mysqli("localhost", "root", "", "records_db");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $result = $conn->query("SELECT status FROM users WHERE id = $id");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $newStatus = ($row['status'] == 0) ? 1 : 0;

        $conn->query("UPDATE users SET status = $newStatus WHERE id = $id");

        echo ($newStatus == 1) ? "مفعل" : "غير مفعل";
    }
}

$conn->close();
?>