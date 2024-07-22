<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['id'])) {
    header("Location: loginandregister.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

 
    $email_check_query = "SELECT id FROM users WHERE email = '$email' AND id != '$id'";
    $email_check_result = mysqli_query($conn, $email_check_query);

    if (mysqli_num_rows($email_check_result) > 0) {
        $_SESSION['update_message'] = "Error: Email already exists.";
    } else {
     
        $sql = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['update_message'] = "Records updated successfully.";
        } else {
            $_SESSION['update_message'] = "Error updating record: " . $conn->error;
        }
    }

    header("Location: users.php");
    exit;
}

?>