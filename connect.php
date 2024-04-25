<?php
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $con = new mysqli('localhost','root','','backend');
    if ($con->connect_error) {
        die('Connection failed'. $con->connect_error);
    }else{
        $stml = $con->prepare("insert into user(name, username, password) values(?, ?, ?)");
        $stml->bind_param("sss",$name, $username, $password);
        $stml->execute();
        echo "registration Successfully...";
        $stml->close();
        header('Location: home.html');
        exit;
    }
?>