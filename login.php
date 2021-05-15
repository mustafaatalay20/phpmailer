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
.login-form {
	width: 400px;
	margin: 30px auto;
}
.login-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.login-form h2  {
	color: #333;
	font-weight: bold;
	margin-top: 0;
}
.login-form hr  {
	margin: 0 -30px 20px;
}    
.login-form .form-group {
	margin-bottom: 20px;
}
.login-form input[type="checkbox"] {
	margin-top: 3px;
}
.login-form .row div:first-child {
	padding-right: 10px;
}
.login-form .row div:last-child {
	padding-left: 10px;
}
.login-form .btn {        
	font-size: 16px;
	font-weight: bold;
	background: #3598dc;
	border: none;
	min-width: 140px;
}
.login-form .btn:hover, .login-form .btn:focus {
	background: #2389cd !important;
	outline: none;
}
.login-form a {
	color: #fff;
	text-decoration: underline;
}
.login-form a:hover {
	text-decoration: none;
}
.login-form form a {
	color: #3598dc;
	text-decoration: none;
}	
.login-form form a:hover {
	text-decoration: underline;
}
.login-form .hint-text  {
	padding-bottom: 15px;
	text-align: center;
}
</style>
</head>
<body>
<div class="login-form">
<?php session_start(); if(!empty($_SESSION['kullanici'])) { ?>
	<div>Hoşgeldin <?php echo $_SESSION['kullanici'];?></div>
<div class="logout"><a class="btn btn-success" href="logout.php">Çıkış Yap</a></div>
<?php } else {?>
    <form action="kullanicigiris.php" method="post">
		<h2>Giriş</h2>
		<hr>
        <div class="form-group">
        	<input type="kadi" class="form-control" name="kadi" placeholder="Kullanıcı Adı" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Şifre" required="required">
        </div>     
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="giris">Giriş Yap</button>
        </div>
    </form>
	<div class="hint-text">Üye Olmadıysanız <a href="register.php">Üye Ol</a></div>
	<?php } ?>

</div>
</body>
</html>