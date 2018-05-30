<?php

$id = $_GET['id'];
		 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM apostoles WHERE TRACKING = '$id' ";
$sql2 = "DELETE FROM parakolouthisi WHERE TRACKING = '$id' ";

if ($conn->query($sql) === TRUE) {
    echo "Επιτυχής διαγραφή";
} else {
    echo "Error deleting record: " . $conn->error;
}
if ($conn->query($sql2) === TRUE) {
    echo "Επιτυχής διαγραφή";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

header("Location:ypal_kat_paradosi.php");
?>