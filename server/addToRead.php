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

$sql = "SELECT * FROM books WHERE id = " . $_GET['ID'];

$results = mysqli_query($db, $sql);
$result = mysqli_fetch_assoc($results);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Divyansh Srivastava">
    <title>Book details</title>
</head>
<body>
    <header>
        <h1>Add a book in your read</h1>
    </header>

    <form action="addToReadProcess.php" method="POST">

        <div class="bookItems">
            <div class="ID" hidden>
                <label for="id">Book ID</label>
                <input id="id" type="number" name="id" value="<?php echo $result['ID']?>">
            </div>
            <div class="image">
                <img src="<?php echo $result['cover'] ?>" alt="<?php echo $result['title'] . " cover" ?>">
            </div>
            <div class="title">
                <label for="title">Book title</label>
                <input id="title" type="text" name="title" value="<?php echo $result['title'] ?>">
            </div>
            <div class="author">
                <label for="author">Book Author</label>
                <input id="author" type="text" name="author" value="<?php echo $result['author'] ?>">
            </div>
            <div class="genre">
                <label for="genre">Genre</label>
                <input type="text" name="genre" value="<?php echo $result['genre'] ?>">
            </div>
            <div class="description">
                <label for="description">Description</label>
                <textarea id="description" name="description">
                    <?php echo $result['description'] ?>
                </textarea>
            </div>
            <div class = "rating">
                <label id="rating">Rating</label>
                <input for="rating" name="rating" type="number">
            </div>
            <div class = "review">
                <label id="review">Review</label>
                <input for="review" name="review" type="text">
            </div>

            <div class="addButton">
                <button type="submit">Add book</button>
            </div>

        </div>
    </form>
</body>
</html>
