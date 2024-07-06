<?php

require_once 'config.php';

$id = $_POST["id"];
$userame = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$email_check_query = "SELECT * FROM users WHERE email='$email' AND id != '$id'";
$email_check_result = mysqli_query($conn, $email_check_query);

if (mysqli_num_rows($email_check_result) > 0) {
    echo "Error: Email already exists.";
} else {
    $sql = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Records updated: ".$id."-".$username."-".$email."-".$password;
        //change this so that it shows as a pop up saying update successful and just redirect back to profile page
    } else {
        echo "Error: ".$sql."<br>".$conn->error;
    }
}

?>