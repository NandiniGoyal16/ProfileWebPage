<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $mysqli = new mysqli("localhost", "root", "", "your_database");

   
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $username = $_SESSION['username']; 
    $message = $mysqli->real_escape_string($_POST['message']); 

    
    $query = "INSERT INTO messages (username, message) VALUES ('$username', '$message')";
    if ($mysqli->query($query) === TRUE) {
        echo "Message sent successfully"; 
    } else {
        echo "Error: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
