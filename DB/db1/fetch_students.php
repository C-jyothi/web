<?php
// Database configurationation
$servername = "localhost";
$username = "root";
$password = "";
$database = "sample_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("<p style='color: red;'>Connection failed: " . $conn->connect_error . "</p>");
}

// SQL to fetch data
$sql = "SELECT admission_number, name, department FROM students";
$result = $conn->query($sql);


echo "
<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            padding: 30px;
            text-align: center;
        }
        h2 {
            color: #2c3e50;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 20px;
            border-bottom: 1px solid #e0e0e0;
        }
        th {
            background-color: #3498db;
            color: white;
            text-transform: uppercase;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h2>Student Details</h2>
";

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Admission No.</th><th>Name</th><th>Department</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["admission_number"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["department"]) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No student records found.</p>";
}

echo "
</body>
</html>
";
$conn->close();
?>
