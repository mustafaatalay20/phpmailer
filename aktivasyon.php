<?php

require_once ('config.php');

if($_POST){
	
	$aktivasyonkodu = $_POST['aktivasyonkodu'];
	$email = $_POST['email'];


	$varmi = $conn->prepare("SELECT * FROM users WHERE email =:email AND aktivasyonkodu =:aktivasyonkodu");
	$varmi->execute([':email'=>$email, ':aktivasyonkodu'=>$aktivasyonkodu]);
	if($varmi->rowCount()){

		$aktifet = $conn->prepare("UPDATE users SET durum=:durum WHERE email=:email AND aktivasyonkodu=:aktivasyonkodu");
		$aktifet->execute([':durum'=>1,':email'=>$email, ':aktivasyonkodu'=>$aktivasyonkodu]);

		if($aktifet){
		
			echo "Üyeliğiniz başarıyla aktif edildi giriş yapabilirsiniz";

		}else{
			echo "Hata oluştu";
		}

	}else{
		echo "Yazmış olduğunuz bilgilere göre bir veri bulunmamaktadır.";
	}
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
<style>
body {
	color: #fff;
	background: #3598dc;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 41px;
	background: #f2f2f2;
	box-shadow: none !important;
	border: none;
}
.form-control:focus {
	background: #e2e2e2;
}
.form-control, .btn {        
	border-radius: 3px;
}
.activation-form {
	width: 400px;
	margin: 30px auto;
}
.activation-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.activation-form h2  {
	color: #333;
	font-weight: bold;
	margin-top: 0;
}
.activation-form hr  {
	margin: 0 -30px 20px;
}    
.activation-form .form-group {
	margin-bottom: 20px;
}
.activation-form input[type="checkbox"] {
	margin-top: 3px;
}
.activation-form .row div:first-child {
	padding-right: 10px;
}
.activation-form .row div:last-child {
	padding-left: 10px;
}
.activation-form .btn {        
	font-size: 16px;
	font-weight: bold;
	background: #3598dc;
	border: none;
	min-width: 140px;
}
.activation-form .btn:hover, .activation-form .btn:focus {
	background: #2389cd !important;
	outline: none;
}
.activation-form a {
	color: #fff;
	text-decoration: underline;
}
.activation-form a:hover {
	text-decoration: none;
}
.activation-form form a {
	color: #3598dc;
	text-decoration: none;
}	
.activation-form form a:hover {
	text-decoration: underline;
}
.activation-form .hint-text  {
	padding-bottom: 15px;
	text-align: center;
}
</style>
</head>
<body>
<div class="activation-form">
    <form action="" method="POST">
		<h2>Aktivasyon</h2>
		<hr>
        <div class="form-group">
        	<input value="<?php echo $_GET['kod'] == "" ? "": $_GET['kod']; ?>" type="text" class="form-control" name="aktivasyonkodu" placeholder="Aktivasyon Kodu" required="required">
        </div>
		<div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Üye Olduğunuz E-Posta Adresini Gririniz" required="required">
        </div>     
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="giris">Aktif Et</button>
        </div>
    </form>
	<div class="hint-text">Üye Olmadıysanız <a href="register.php">Üye Ol</a></div>
</div>
</body>
</html>