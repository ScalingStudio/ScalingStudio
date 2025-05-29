<?php
// Введите сюда ваш токен бота и ID админ-чата
$bot_token = '8156425675:AAFTzGYZ9mk5bk1lhYqsz56RxUYCT7G_l00';
$chat_id = '-1002589923327'; // Можно узнать, написав боту и выведя ID из update

// Получаем данные из формы
$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$message = htmlspecialchars($_POST['message']);

// Формируем текст сообщения
$text = "Новая заявка с сайта:\n";
$text .= "Имя: $name\n";
$text .= "Телефон: $phone\n";
$text .= "Сообщение: $message";

// URL для отправки запроса к Telegram Bot API
$url = "https://api.telegram.org/bot$bot_token/sendMessage";

// Параметры запроса
$params = [
    'chat_id' => $chat_id,
    'text' => $text,
    'parse_mode' => 'HTML'
];

// Инициализация запроса
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Отправка и получение ответа
$result = curl_exec($ch);
curl_close($ch);

// Перенаправление после отправки
header('Location: thankyou.html');
exit;
?>