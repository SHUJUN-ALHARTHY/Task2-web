<?php
$conn = new mysqli("localhost", "root", "", "records_db");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['age']}</td>";
        echo "<td id='status-{$row['id']}'>" . ($row['status'] == 1 ? "مفعل" : "غير مفعل") . "</td>";
        echo "<td><button onclick='toggleStatus({$row['id']})'>تغيير</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>لا توجد سجلات</td></tr>";
}

$conn->close();
?>