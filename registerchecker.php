<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $con = new mysqli('localhost','root','','backend');
    if ($con->connect_error) {
        die('Connection failed'. $con->connect_error);
    }else{
        $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Login successful, redirect to home.html
            header('Location: home.html');
            exit;
        } else {
            echo "Invalid username or password";
        }
        $stmt->close();
    }
    $con->close();
?>