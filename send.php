<?php

// ======================================================
// KAISSA
// send.php
// ======================================================

header("Content-Type: text/html; charset=UTF-8");

// ----------------------------
// Почта владельца
// ----------------------------

$to = "shestachulya@gmail.com"; // <-- замените на свою почту

// ----------------------------

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Ошибка доступа.");
}

// ----------------------------
// Получение данных
// ----------------------------

$name = trim($_POST["name"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$email = trim($_POST["email"] ?? "");
$address = trim($_POST["address"] ?? "");
$tariff = trim($_POST["tariff"] ?? "");

// ----------------------------
// Проверка
// ----------------------------

if (
    empty($name) ||
    empty($phone) ||
    empty($email) ||
    empty($address) ||
    empty($tariff)
) {
    die("Заполните все поля.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Некорректный Email.");
}

// ----------------------------
// Защита
// ----------------------------

$name = htmlspecialchars($name);
$phone = htmlspecialchars($phone);
$email = htmlspecialchars($email);
$address = htmlspecialchars($address);
$tariff = htmlspecialchars($tariff);

// ----------------------------
// Сообщение
// ----------------------------

$subject = "Новая заявка с сайта Каисса";

$message = "

<html>

<head>

<meta charset='UTF-8'>

</head>

<body style='font-family:Arial,sans-serif;background:#f4f4f4;padding:30px;'>

<div style='background:white;border-radius:12px;padding:30px;max-width:650px;margin:auto;'>

<h2 style='color:#b38b2d;'>

♟ Новая заявка с сайта

</h2>

<hr>

<p><strong>ФИО:</strong><br>$name</p>

<p><strong>Телефон:</strong><br>$phone</p>

<p><strong>Email:</strong><br>$email</p>

<p><strong>Филиал:</strong><br>$address</p>

<p><strong>Тариф:</strong><br>$tariff</p>

<hr>

<p style='color:#777;'>

Письмо отправлено автоматически с сайта школы шахмат «Каисса».

</p>

</div>

</body>

</html>

";

// ----------------------------
// Заголовки
// ----------------------------

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=UTF-8\r\n";
$headers .= "From: Каисса <no-reply@yourdomain.ru>\r\n";
$headers .= "Reply-To: $email\r\n";

// ----------------------------
// Отправка
// ----------------------------

if (mail($to, $subject, $message, $headers)) {

?>

<!DOCTYPE html>

<html lang="ru">

<head>

<meta charset="UTF-8">

<title>Заявка отправлена</title>

<style>

body{

background:#0d0d0d;

color:white;

font-family:Arial;

display:flex;

justify-content:center;

align-items:center;

height:100vh;

margin:0;

}

.card{

background:#181818;

padding:60px;

border-radius:20px;

text-align:center;

max-width:500px;

border:1px solid rgba(255,255,255,.08);

}

h1{

color:#d6b45d;

margin-bottom:20px;

}

a{

display:inline-block;

margin-top:30px;

padding:15px 35px;

background:#d6b45d;

color:#111;

border-radius:40px;

text-decoration:none;

font-weight:bold;

}

</style>

</head>

<body>

<div class="card">

<h1>Спасибо!</h1>

<p>

Ваша заявка успешно отправлена.

</p>

<p>

Мы свяжемся с вами в ближайшее время.

</p>

<a href="index.html">

Вернуться на сайт

</a>

</div>

</body>

</html>

<?php

} else {

echo "Ошибка отправки письма.";

}

?>