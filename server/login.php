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

    $username = "";
    $password = "";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script src="../js/script.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Divyansh Srivastava">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>

<?php



if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

if (isset($_SERVER['username']) && isset($_SERVER['password'])){
    $username = $_SERVER['username'];
    $password = $_SERVER['password'];
}

if (!empty($username) && !empty($password)) {

    $sql = "SELECT * FROM Users WHERE username = '$username';";

    $result_set = mysqli_query($db, $sql);

    if (mysqli_num_rows($result_set) == 0) {
        echo "<p>No matching user.</p>";        //js?
        header("refresh:5;url=login.php");

    } else {
        $results = mysqli_fetch_assoc($result_set);
        if ($results['username'] == $username && $results['password'] == $password) {
            echo "<p>Matching user found</p>";
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("Location: catalog.php");
        } else {
            echo "<p>Incorrect password</p>";
            header("refresh:5;url=login.php");
        }
    }
}

    ?>


    <form action="login.php" method="POST" onsubmit="validate()">
        <div class="formDiv">

            <label for="username" class="formLabel">Username</label>
            <input type="text" id="username" name="username" class="formInput" />
            <br>
            <label for="password" class="formLabel">Password</label>
            <input type="text" id="password" name="password" class="formInput" />

        </div>

        <button type="submit" class="button">Send</button>

    </form>

</body>
</html>