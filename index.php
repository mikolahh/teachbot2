<?php
// Код для вывлда ошибок
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// https://api.telegram.org/bot5653090500:AAFR7_OQ6-d_I0A8t-uItzW17sEf3PTFiXg/getUpdates

// Устанавливаем константы для токена нашего бота и id чата, куда бот будет посылать сообщения
// и откуда он будет их принимать, непосредственно id чата с каким-либо юзером , или юзерайди мы узнаем, 
// запустив бота со стороны этого юзера (команда /start) и сделав запрос следующего вида:
// https://api.telegram.org/bot5653090500:AAFR7_OQ6-d_I0A8t-uItzW17sEf3PTFiXg/getUpdates , далее перейдя по этой ссылке мы и 
// можем узнать в числе прочего и юзер айди этого пользователя
define("tg_token", "5653090500:AAFR7_OQ6-d_I0A8t-uItzW17sEf3PTFiXg");
define("tg_user_id", 1551080903);
define("apiUrl", "https://api.telegram.org/bot");
// ssh mikalayt@vh116.hoster.by -p 22          ew8nieKo

$textMessage = "Text message";
// Преобразуем обычную строку в специальную кодировку для отправки get-запросом
$textMessage = urlencode($textMessage);
echo "<br>";
// Попробуем сформировать переменную для плучения обновлений от бота
$getBotUpdate = apiUrl . tg_token . "/getUpdates";
$lastUpdates = file_get_contents($getBotUpdate);
echo "Последние обновления, вывод через эхо: ";
echo $lastUpdates;
echo "<br>";
echo "Последние обновления, вывод через вардамп: ";
var_dump($lastUpdates);
// Сформируем переменную с запросом для отправки сообщения
$urlQuery = apiUrl . tg_token . "/sendMessage?chat_id=" . tg_user_id . "&text=" . $textMessage;
// var_dump($urlQuery);
echo "<br>";
$result = file_get_contents($urlQuery);
echo "Возвращенный ответ на отправленное сообщение через эхо: ";
echo $result;
echo "<br>";
echo "Возвращенный ответ на отправленное сообщение через вардамп: ";
var_dump($result);