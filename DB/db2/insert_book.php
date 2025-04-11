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

// Get form data
$accession_number = $_POST['accession_number'];
$title = $_POST['title'];
$authors = $_POST['authors'];
$edition = $_POST['edition'];
$publisher = $_POST['publisher'];

// Insert
$sql = "INSERT INTO books (accession_number, title, authors, edition, publisher)
        VALUES ('$accession_number', '$title', '$authors', '$edition', '$publisher')";

if ($conn->query($sql) === TRUE) {
    echo "<p>Book added successfully!</p>";
    echo "<a href='book_form.html'>Go back</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
