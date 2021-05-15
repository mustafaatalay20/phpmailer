<?php

require_once ('mail\class.phpmailer.php');

include ('config.php');
   
        $kadi = $_POST['kadi'];
        $email = $_POST['email'];
        $sifre = $_POST['password'];
        $sifrele = md5($sifre);
        $aktivasyonkodu = rand();
        $durum = 2;    //üye durum = 2 onay bekleyen
        //üye durum = 1 onaylı üye  

        $tarihsaat=date("Y-m-d h:i:s"); 

       
	    $varmi = $conn->prepare("SELECT * FROM users WHERE email =:email");
	    $varmi->execute(['email'=>$email]);

        if($varmi->rowCount())
        {
            echo "Aynı e-mail ile kayıtlı kullanıcı var";
        }
        else
        {
            $sorgu = "INSERT INTO users (email, username, sifre, kayittarihi, aktivasyonkodu, durum) VALUES ('$email', '$kadi', '$sifrele','$tarihsaat', '$aktivasyonkodu', '$durum')"; 
            $conn->exec($sorgu);

            $aktivasyonlinki = "http://localhost/PHPODEV2/aktivasyon.php?kod=".$aktivasyonkodu;
    
                $mailicerigi = "<div style='background:red; color:#fff'>Aktivasyon Linkiniz : ".$aktivasyonlinki."</div>";
            
        
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPDebug = 1;
                $mail->SMTPAuth = true;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPSecure = 'tls';
                $mail->Username = 'mustafaatalay3220@gmail.com';
                $mail->Password = 'mustafa35720';
                $mail->SetFrom($mail->Username, 'hello');
                $mail->AddAddress($email, 'gönderilen kişinin adı soyadı');
                $mail->CharSet = 'UTF-8';
                $mail->Subject = 'AKTİVASYON MAİL';
                $content = '<div style="background: #eee; padding: 10px; font-size: 14px">Bu bir test e-posta\'dır..</div>';
                $mail->MsgHTML($mailicerigi);        
            
                if($mail->Send()){
                    echo "Üyeliğiniz başarıyla gerçekleşti lütfen mail adresinize gelen link üzerinden üyeliğinizi onaylayınız.";   
                }
                else{
                    echo "Hata oluştu";
                }
        }

?>
