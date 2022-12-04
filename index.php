<?php
// Код для вывлда ошибок
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
// здесь может быть как id отдельного пользователя, так и группы, куда будет отправляться сообщение
define("tg_user_id", -881391231);
define("apiUrl", "https://api.telegram.org/bot");
// Попробуем сформировать переменную для плучения обновлений от бота
$getBotUpdate = apiUrl . tg_token . "/getUpdates";

// Получаем обновления от бота через интересную функцию
$lastUpdates = file_get_contents($getBotUpdate);

// Выводим полученные обновления
echo "Последние обновления, вывод через нашу специальную функцию: ";
prv(json_decode($lastUpdates, true));

$arrayQuery = array(
	'chat_id' => tg_user_id,
	'caption' => 'Проверка работы',
	//  'photo' => curl_file_create(__DIR__ . '/diplom.jpg', 'image/jpg' , 'diplom.jpg')
	'document' => curl_file_create(__DIR__ . '/diplom.jpg', 'image/jpg', 'diplom.jpg')
);
// $ch = curl_init(apiUrl . tg_token .'/sendPhoto');
$ch = curl_init(apiUrl . tg_token . '/sendDcument');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayQuery);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);
prv(json_decode($res, true));


// ssh mikalayt@vh116.hoster.by -p 22   ew8nieKo
