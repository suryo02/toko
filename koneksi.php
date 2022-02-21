<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname   = "toko";

$kon = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terhubung ke database');
?>