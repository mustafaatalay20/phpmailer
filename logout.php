<?php

session_start();
 
unset($_SESSION['kullanici']);
session_destroy();

header("Refresh:2; url=register.php");


?>

<p>Oturumdan Çıkış Yapılıyor</p>


