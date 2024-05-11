<!--
Author: Divyansh Srivastava
College ID: 041109063
Date: 30/3/2024
-->

<?php
    session_start();
    include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Divyansh Srivastava">
    <title>Catalog</title>
</head>
<body>
    <header>
        <h1>Browse available books</h1>
        <nav>
            <a href="catalog.php">Catalog</a>
            <a href="mylist.php">Books I've Read</a>
            <a href="addBook.php">Add a book</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
   
    <?php

    require_once('db_credentials.php');
    require_once('database.php');
    $db = db_connect('BCSdb');

    $sql = "SELECT * FROM books;";
    $result_set = mysqli_query($db, $sql);

    ?>

    <?php while($results = mysqli_fetch_assoc($result_set)) { ?>
    
    <hr>

    <div class="bookItems">
        <div class="ID">
            <p hidden><?php echo $results['ID']?></p>
        </div>
        <div class="image">
            <img src="<?php echo $results['cover']?>" alt="<?php echo $results['title'] . " cover"?>"/>
        </div>
        <div class="title">
            <h2><?php echo $results['title']?></h2>
        </div>
        <div class="author">
            <p><?php echo $results['author'] ?></p>
        </div>
        <div class="genre">
            <p><?php echo $results['genre'] ?></p>
        </div>
        <div class="description">
            <p><?php echo $results['description'] ?></p>
        </div>

        <div class="addButton">
             <a class="action" href="<?php echo "addToRead.php?ID=" . $results['ID']; ?>">Add to Read List?</a>
        </div>

    </div>

    <?php } ?>
</body>
</html>