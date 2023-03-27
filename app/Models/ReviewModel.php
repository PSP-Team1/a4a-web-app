<?php
$servername = "ci-db.mysql.database.azure.com";
$username = "psp_admin";
$password = "P5PAdm1n!";
$dbname = "ci_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$id = $_POST["id"];
$review = $_POST["review"];

// Insert review into company_venue table
$sql = "INSERT INTO company_venue (id, Review) VALUES ('$id', '$review')";

if ($conn->query($sql) === TRUE) {
  echo "Review submitted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>