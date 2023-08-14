<?php 

$name = $_POST['name'];
$surname = $_POST['surname'];
// $phone = $_POST['phone'];
// $email = $_POST['email'];
$drink = $_POST['drink'];
$mydrink = $_POST['my_drink'];
$food = $_POST['food'];
$myfood = $_POST['my_food'];
$children = $_POST['children'];
$place = $_POST['place'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '*****';                 // Наш логин
$mail->Password = '*****';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('*****', 'Опрос к свадьбе');   // От кого письмо 
$mail->addAddress('*****');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Данные';
// Формирование самого письма
$title = 'Новое письмо с результатом опроса';
$mail->Body = '
Пользователь оставил данные:<br>
<b>Имя и фамилия:</b> ' . $name . ' ' . $surname . ' <br>
<b>Предпочитаемый напиток:</b> ' . $drink . ' ' . $mydrink . ' <br>
<b>Предпочтения по еде:</b> ' . $food . ' ' . $myfood . ' <br>
<b>Будет ли с вами ребенок:</b> ' . $children . ' <br>
<b>Вы присоединитесь к нам:</b> ' . $place . '<br>
';

// $mail->Body    = '
// 	Пользователь оставил данные <br> 
// 	Имя: ' . $name . ' <br>
// 	Номер телефона: ' . $phone . '<br>
// 	E-mail: ' . $email . '';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>