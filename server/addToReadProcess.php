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

$_POST['id'];
$sql = "SELECT * FROM Books WHERE ID = ". $_POST['id'];
$result = mysqli_query($db, $sql);
$cover = mysqli_fetch_assoc($result);
$cover = $cover['cover'];

$sql = "INSERT INTO $username VALUES (\"";
$sql .= $_POST['id'];
$sql .= "\", \"";
$sql .= $_POST['title'];
$sql .= "\", \"";
$sql .= $_POST['description'];
$sql .= "\", \"";
$sql .= $_POST['author'];
$sql .= "\", \"";
$sql .= $_POST['genre'];
$sql .= "\", \"";
$sql .= $cover;
$sql .= "\", \"";
$sql .= $_POST['rating'];
$sql .= "\", \"";
$sql .= $_POST['review'];
$sql .= "\");";

$result = mysqli_query($db, $sql);

if($result){
    echo "<p>Book added successfully. Returning to catalog.";
    header("refresh:5;url=catalog.php");
}
else{
    echo "<p>Book couldn't be added. Returning to catalog.";
    header("refresh:5;url=catalog.php");
}