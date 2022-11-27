<?php 

// Код для вывлда ошибок
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// Функция для красивого вывода переменных на экран
function prv($var) {
	static $int = 0;
	echo '<pre><b style="background: blue;padding: 1px 5px;">' . $int . '</b> ';
	var_dump($var);
	// print_r($var);
	echo '</pre>';
	$int++;
	echo '<br><br><br>';
}
define("tg_token", "5653090500:AAFR7_OQ6-d_I0A8t-uItzW17sEf3PTFiXg");
// здесь может быть как id отдельного пользователя, так и группы, куда будет отправляться сообщение
define("tg_user_id", -890207934);
define("apiUrl", "https://api.telegram.org/bot");
// Попробуем сформировать переменную для плучения обновлений от бота
$getBotUpdate = apiUrl . tg_token . "/getUpdates";

// Получаем обновления от бота через интересную функцию
$lastUpdates = file_get_contents($getBotUpdate);

// Выводим полученные обновления
echo "Последние обновления, вывод через нашу специальную функцию: ";
prv(json_decode($lastUpdates, true));

// вводим переменную с телом сообщения
$textMessage = 'Очередное тестовое сообщение';

// Массив для передачи параметров в сообщение
$getQuery = array(
	"chat_id" => tg_user_id,
	"text" => $textMessage,
	"parse_mode" => "html",
);
// формируем шаблон строки запроса на передачу сообщения
$ch = curl_init(apiUrl . tg_token . "/sendMessage?" . http_build_query($getQuery));
// передаем специальные параметры запроса с помощью функции cutl_setopt
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
// делаем запрос с возвращением данных
$resultQuery = curl_exec($ch);
//Закрываем соединение 
curl_close($ch);

// красиво выводим возвращаемый ответ от передачи запроса на отправку сообщения
echo "Выводим результат запроса: ";
prv(json_decode($resultQuery));












 ?>