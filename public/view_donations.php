<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}
$conn = new mysqli("sql12.freesqldatabase.com", "sql12785684", "ELNjgF5R4Z", "sql12785684", 3306);

$limit = 20;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$result = $conn->query("SELECT d.*, r.restaurant_name FROM Donations d
JOIN Restaurants r ON d.restaurant_id = r.restaurant_id
WHERE d.expiry_time > NOW()
ORDER BY d.expiry_time ASC LIMIT $start, $limit");

echo "<table border='1'><tr><th>Restaurant</th><th>Food</th><th>Qty</th><th>Prepared</th><th>Expiry</th><th>Status</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['restaurant_name']}</td><td>{$row['food_name']}</td><td>{$row['quantity']}</td><td>{$row['prepared_time']}</td><td>{$row['expiry_time']}</td><td>{$row['status']}</td></tr>";
}
echo "</table>";

$countResult = $conn->query("SELECT COUNT(*) AS total FROM Donations WHERE expiry_time > NOW()");
$total = $countResult->fetch_assoc()['total'];
$pages = ceil($total / $limit);

for ($i = 1; $i <= $pages; $i++) {
    echo "<a href='view_donations.php?page=$i'>$i</a> ";
}
?>