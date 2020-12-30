<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer-6.2.0.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHtml(true);


$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 2;
 
$mail->Host = 'ssl://smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'televizorkuhonnyj9@gmail.com';
$mail->Password = 'darktime12';

$mail->setFrom('televizorkuhonnyj9@gmail.com','Заказчик');

$mail->addAddress('timejerome@gmail.com');

$mail->Subject = 'Новый заказ';

$body = '<h1>Новый Заказчик</h1>';

if(trim(!empty($_POST['name']))){
    $body.=<p><strong>Имя:</strong> '.$_POST['name'].'</p>;
}
if(trim(!empty($_POST['pfone']))){
    $body.=<p><strong>Номер:</strong> '.$_POST['pfone'].'</p>;
}
$mail->Body = $body;

if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Данные отправлены!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>

