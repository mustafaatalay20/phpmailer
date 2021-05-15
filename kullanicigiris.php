
<?php

include ("config.php");

ob_start();
session_start();

$kadi = $_POST['kadi'];
$sifre = $_POST['password'];
$sifrele = md5($sifre);



$kullanici = $conn->query("SELECT * FROM users WHERE username = '$kadi' AND sifre = '$sifrele'")->fetch(PDO::FETCH_ASSOC);

if($kullanici["durum"] == 1)
{
    $_SESSION["kullanici"] = $kadi;
    echo "Başarılı bir şekilde giriş yapıldı";
}
else
{
    echo "Bilgiler hatalı veya üyeliğinizi aktif etmediniz";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Kayıt Ol</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 

<?php if(!empty($_SESSION['kullanici'])) { ?>
<div class="logout"><a class="btn btn-danger" href="logout.php">Çıkış Yap</a></div>
<?php } else {?>
    <?php } ?>

</head>
</html>
