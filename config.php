<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=kullanicidb", $username, $password);
    //echo "Bağlantı Başarılı";
  } catch(PDOException $e) {
    echo "Bağlantı Hatası: " . $e->getMessage();
  }

?>