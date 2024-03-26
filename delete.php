<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP is empty
$dbname = "yourdbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$action = $_POST['action'];
$id = $_POST['id'];

if ($action == "delete") {
  if (!empty($id)) {
    // Construct the delete query with a WHERE condition based on the provided ID
    $sql = "DELETE FROM yourtable WHERE ID=$id";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
      echo "Success";
    } else {
      echo "Error: " . $conn->error;
    }
  } else {
    echo "Error: Please provide the ID of the record you want to delete.";
  }
} else {
  echo "Error: Invalid action specified.";
}

$conn->close();
?>
