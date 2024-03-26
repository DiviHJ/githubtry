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

// Rest of your code here

$action = $_POST['action'];
$id = $_POST['id'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$age = $_POST['age'];

if ($action == "insert") {
  $sql = "INSERT INTO yourtable (ID, FirstName, LastName, Age)
  VALUES ($id, '$firstName', '$lastName', $age)";
} else if ($action == "update") {
  $sql = "UPDATE yourtable SET FirstName='$firstName', LastName='$lastName', Age=$age WHERE ID=$id";
} else if ($action == "delete") {
  $sql = "DELETE FROM yourtable WHERE ID=$id";
}

if ($conn->query($sql) === TRUE) {
  echo "Success";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
