
<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $mysqli = new mysqli("localhost", "root", "", "your_database");


    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }


    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT );

    $additional_info = $_POST['additional_info'];

    $query = "INSERT INTO users (username, email, password, additional_info) VALUES ('$username', '$email', '$password', '$additional_info')";
    if ($mysqli->query($query) === TRUE) {
        $_SESSION['username'] = $username; 
        header("Location: thankyou.html"); 
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
    $mysqli->close();
}
?>
