<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("DROP TABLE IF EXISTS employees");

$createTable = "CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_name VARCHAR(100) NOT NULL,
    employee_email VARCHAR(100) NOT NULL
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error: " . $conn->error . "<br>";
}

$stmt = $conn->prepare("INSERT INTO employees (employee_name, employee_email) VALUES (?, ?)");
$stmt->bind_param("ss", $employee_name, $employee_email);

$employee_name = "John Doe";
$employee_email = "john@company.com";
if ($stmt->execute()) {
    echo "Record 1 inserted successfully<br>";
} else {
    echo "Error: " . $stmt->error . "<br>";
}

$employee_name = "Jane Smith";
$employee_email = "jane@company.com";
if ($stmt->execute()) {
    echo "Record 2 inserted successfully<br>";
} else {
    echo "Error: " . $stmt->error . "<br>";
}

$result = $conn->query("SELECT * FROM employees");
echo "<h3>Employee Records:</h3>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["employee_name"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["employee_email"]) . "</td>";
    echo "</tr>";
}
echo "</table>";

$stmt->close();
$conn->close();
?>
