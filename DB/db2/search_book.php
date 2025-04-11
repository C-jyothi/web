<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "library_db";

// Connect to DB
$conn = new mysqli($servername, $username, $password, $database);

// Check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search value
$search_title = $_GET['search_title'];

// Search query
$sql = "SELECT * FROM books WHERE title LIKE '%$search_title%'";
$result = $conn->query($sql);

// Output
echo "<h2>Search Results for: '$search_title'</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><th>Accession No</th><th>Title</th><th>Authors</th><th>Edition</th><th>Publisher</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['accession_number'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['authors'] . "</td>";
        echo "<td>" . $row['edition'] . "</td>";
        echo "<td>" . $row['publisher'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No books found with that title.</p>";
}

echo "<br><a href='book_form.html'>Go Back</a>";

$conn->close();
?>
