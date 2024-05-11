<!--
Author: Divyansh Srivastava
College ID: 041109063
Date: 30/3/2024
-->

<?php

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])){
    header("Location: ../index.html");
}

?>