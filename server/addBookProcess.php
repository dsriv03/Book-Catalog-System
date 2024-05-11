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
$cover = '';

if (isset($_FILES['image'])) {
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_name = $_FILES['image']['name'];
    $explodeResult = explode('.', $_FILES['image']['name']);
    $file_ext = strtolower(end($explodeResult));
    $ext = array("jpeg", "jpg", "png");
    if (in_array($file_ext, $ext) === false) {
        $cover = "img/default.jpg";
    } else {
        $cover = "../" . "img/" . $_POST['title'] . $_POST['author'] . "." . $file_ext;
        move_uploaded_file($file_tmp, $cover);
    }
}
else{
    $cover = "img/default.jpg";
}


$sql = "INSERT INTO books(title, description, author, genre, cover) VALUES (\"";
$sql .= $_POST['title'];
$sql .= "\", \"";
$sql .= $_POST['description'];
$sql .= "\", \"";
$sql .= $_POST['author'];
$sql .= "\", \"";
$sql .= $_POST['genre'];
$sql .= "\", \"";
$sql .= $cover;
$sql .= "\");";

$result = mysqli_query($db, $sql);

if ($result) {
    echo "<p>Book added successfully. Returning to catalog.";
    header("refresh:5;url=catalog.php");
}
else {
    echo "<p>Book couldn't be added. Returning to catalog.";
    header("refresh:5;url=catalog.php");
}