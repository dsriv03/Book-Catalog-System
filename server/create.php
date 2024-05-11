<!--
Author: Divyansh Srivastava
College ID: 041109063
Date: 30/3/2024
-->

<?php

session_start();

    require_once('db_credentials.php');
    require_once('database.php');
    $db = db_connect('BCSdb');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Users(username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($db, $sql);

    $sql = "CREATE TABLE $username(
    ID INT AUTO_INCREMENT PRIMARY KEY,
    title varchar(50),
    description varchar(200),
    author varchar(50),
    genre varchar(200),
    cover varchar(200),
    rating int,
    review varchar(200)
    );";
    $result = mysqli_query($db, $sql);

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("Location: login.php");
}

else{
    header("Location: ../index.html");
}
?>