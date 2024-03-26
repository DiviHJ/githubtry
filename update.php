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
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$age = $_POST['age'];

if ($action == "update") {
  // Check if the record with the provided ID exists
  $check_query = "SELECT * FROM yourtable WHERE ID=$id";
  $result = $conn->query($check_query);
  if ($result->num_rows == 0) {
    echo "Error: Record with ID $id does not exist.";
  } else {
    // Update the record if it exists
    $sql = "UPDATE yourtable SET FirstName='$firstName', LastName='$lastName', Age=$age WHERE ID=$id";
    if ($conn->query($sql) === TRUE) {
      echo "Success";
    } else {
      echo "Error: " . $conn->error;
    }
  }
} else {
  echo "Error: Invalid action specified.";
}

$conn->close();
?>
