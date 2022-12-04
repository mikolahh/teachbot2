<?php
// Код для вывода ошибок
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// Функция для красивого вывода переменных на экран
function prv($var)
{
   static $int = 0;
   echo '<pre><b style="background: blue;padding: 1px 5px;">' . $int . '</b> ';
   var_dump($var);
   // print_r($var);
   echo '</pre>';
   $int++;
   echo '<br><br><br>';
}
define("tg_token", "5653090500:AAFR7_OQ6-d_I0A8t-uItzW17sEf3PTFiXg");
// здесь может быть как id отдельного пользователя, так и группы,
//  куда будет отправляться сообщение
define("tg_group_id", -881391231);
define("apiUrl", "https://api.telegram.org/bot");
define("botUrl", "https://mikalay.tech/bot/index.php");

// Формируем массив с параметрами запроса на установку хука
$getQuery = array(
   "url" => botUrl,
);
// формируем сам запрос на установку хука с поощью curl
$ch = curl_init(apiUrl . tg_token . "/setWebhook?" . http_build_query($getQuery));
// Прописываем параметры curl

// Чтобы curl не выводил результат, а возвращал его
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Запрещаем проверку ssl-сертификата удаленного сервера
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Исключаем из результата заголовки
curl_setopt($ch, CURLOPT_HEADER, false);

// Вызываем запрос
$resultQuery = curl_exec($ch);

// закрываем сессию
curl_close($ch);

// Красиво выводим результаты
prv($resultQuery);
