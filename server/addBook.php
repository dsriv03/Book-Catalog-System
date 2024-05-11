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
include 'auth.php';

$username = $_SESSION['username'];
$password = $_SESSION['password'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Divyansh Srivastava" />
    <title>Book details</title>
</head>
<body>
    <header>
        <h1>Add a book in your read list</h1>
    </header>

    <form action="addBookProcess.php" method="POST" enctype="multipart/form-data">

        <div class="bookItems">
            <div class="image">
                <label for="image">Book Cover</label>
                <input type="file" id="name" name="image" />
            </div>
            <div class="title">
                <label for="title">Book title</label>
                <input id="title" type="text" name="title" />
            </div>
            <div class="author">
                <label for="author">Book Author</label>
                <input id="author" type="text" name="author" />
            </div>
            <div class="genre">
                <label for="genre">Genre</label>
                <input type="text" name="genre" />
            </div>
            <div class="description">
                <label for="description">Description</label>
                <textarea id="description" name="description"></textarea>
            </div>

            <div class="addButton">
                <button type="submit">Add book</button>
            </div>

        </div>
    </form>
</body>
</html>
