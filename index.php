<?php
// Код для вывлда ошибок
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
function prv($var)
{
	static $int = 0;
	echo '<pre><b style="background: blue;padding: 1px 5px;">' . $int . '</b> ';
	var_dump($var);
	echo '</pre>';
	$int++;
}

// https://api.telegram.org/bot5653090500:AAFR7_OQ6-d_I0A8t-uItzW17sEf3PTFiXg/getUpdates

// Устанавливаем константы для токена нашего бота и id чата, куда бот будет посылать сообщения
// и откуда он будет их принимать, непосредственно id чата с каким-либо юзером , или юзерайди мы узнаем, 
// запустив бота со стороны этого юзера (команда /start) и сделав запрос следующего вида:
// https://api.telegram.org/bot5653090500:AAFR7_OQ6-d_I0A8t-uItzW17sEf3PTFiXg/getUpdates , далее перейдя по этой ссылке мы и 
// можем узнать в числе прочего и юзер айди этого пользователя
define("tg_token", "5653090500:AAFR7_OQ6-d_I0A8t-uItzW17sEf3PTFiXg");
define("tg_user_id", 1551080903);
define("apiUrl", "https://api.telegram.org/bot");
// Попробуем сформировать переменную для плучения обновлений от бота
$getBotUpdate = apiUrl . tg_token . "/getUpdates";

// Получаем обновления от бота через интересную функцию
$lastUpdates = file_get_contents($getBotUpdate);

// Выводим полученные обновления
echo "Последние обновления, вывод через вардамп: ";
var_dump($lastUpdates);
echo '<br><br><br>';


// Вводим переменную для сообщения пользователю
// $textMessage = "Text message";
// Преобразуем обычную строку в специальную кодировку для отправки get-запросом
// $textMessage = urlencode($textMessage);
// Сформируем переменную с запросом для отправки сообщения, включив в нее, кроме самого сообщения
// еще один обязательный папраметр: chat_id
// $urlQuery = apiUrl . tg_token . "/sendMessage?chat_id=" . tg_user_id . "&text=" . $textMessage;
// Отправлям сообщение пользователю через очень интересную функцию
// $result = file_get_contents($urlQuery);

// А теперь немного усложняем задачу - будем отправлять сообщение не через "интересную функцию", 
// а с использованием библиотеки curl, которая позволит нам не лепить строку запроса каждый раз 
// из параметров, а задавать параметры отдельно в виде массива, добавив один необязательный параметр
// parce_mode, который в конечном итоге позволит нам как-то структурировать наше сообщение


// Итак, задаем массив с параметрами, текст сообщения зададим отдельно и тремя строками, надо обратить внимание, такой вот интересный способ конкатенации
$textMessage = "Строка <u>1</u> \n";
$textMessage .= "Строка <u>2</u> \n";
$textMessage .= "Строка <u>3</u>";

$getQuery = array(
	"chat_id" => tg_user_id,
	"text" => $textMessage,
	"parse_mode" => "html",
);
// инициализируем curl, создав переменную ch, curl_init принимает единственный параметр - ссылку, 
// где функция http_build_query генерирует специальную строку запроса из массива
$ch = curl_init(apiUrl . tg_token . "/sendMessage?" . http_build_query($getQuery));
// передаем специальные параметры запроса с помощью функции cutl_setopt
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);

// делаем запрос с возвращением данных
$resultQuery = curl_exec($ch);
$resultOutput = json_decode($resultQuery);
//Закрываем соединение 
curl_close($ch);
// выводим результат возвращаемый
echo "Выводим результат запроса: ";
prv($resultOutput);
prv($resultQuery);

// ssh mikalayt@vh116.hoster.by -p 22          ew8nieKo










 






// echo "<br>";
