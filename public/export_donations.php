<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=donations.xls");

$conn = new mysqli("sql12.freesqldatabase.com", "sql12785684", "ELNjgF5R4Z", "sql12785684", 3306);
$result = $conn->query("SELECT * FROM Donations");

echo "ID	Restaurant	Food	Quantity	Prepared Time	Expiry Time	Status
";
while ($row = $result->fetch_assoc()) {
    echo "{$row['donation_id']}	{$row['restaurant_id']}	{$row['food_name']}	{$row['quantity']}	{$row['prepared_time']}	{$row['expiry_time']}	{$row['status']}
";
}
$conn->close();
?>