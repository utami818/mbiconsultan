<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$body = "You have received a new message from your website contact form.\n\n".
"<br/>Here are the details:\n\n<br/>
Name: $name\n\n<br/>
Email: $email\n\n<br/>
Phone: $phone\n\n<br/>
Message:\n$message"; 

function Send_Mail($to,$subject,$body){
require 'PHPMailer/PHPMailerAutoload.php';
$email = $_POST['email'];
$mail = new PHPMailer;

// Konfigurasi SMTP
$mail->isSMTP(true);
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('utamieinzwei@gmail.com', 'Email sender');
$mail->Username = 'utamieinzwei@gmail.com';
$mail->Password = 'einzwei12';

$mail->setFrom($email, 'User');
$mail->addReplyTo($email, 'User');
// Subjek email
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;

// Menambahkan penerima
$mail->addAddress($address);

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');

// Menambahkan cc atau bcc 
$mail->addCC('mail.mbiconsultant@gmail.com');
$mail->addBCC('mail.mbiconsultant@mail.com');

// Mengatur format email ke HTML
// $mail->isHTML(true);

// Konten/isi email
// $mailContent = "<h1>Mengirim Email HTML menggunakan SMTP di PHP</h1>
//     <p>Ini adalah email percobaan yang dikirim menggunakan email server SMTP dengan PHPMailer.</p>";
// $mail->Body = $mailContent;

// Menambahakn lampiran
$mail->addAttachment('lmp/file1.pdf');
$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    header('location:index.html');
    echo 'Pesan telah terkirim';
}
}
$to = 'mail.mbiconsultant@gmail.com'; //email tujuan
$subject = 'New Email'; //subject email
header('location:index.html');
echo"<br/><br/><center><h3> pesan telah terkirim </h3></center>";
Send_mail($to,$subject,$body);
?>