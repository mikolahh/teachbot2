<?php
define("tg_user_id", "902636138");
// define("tg_user_id", "-881391231");
define("apiUrl", "https://api.telegram.org/bot");
define("tg_token", "5653090500:AAFR7_OQ6-d_I0A8t-uItzW17sEf3PTFiXg");
require_once "myfunctions/errors.php";
require_once "myfunctions/get_file.php";
require_once "myfunctions/list_files.php";
require_once "myfunctions/prv.php";
require_once "myfunctions/send_message.php";
require_once "myfunctions/send_photo.php";
// require_once "myfunctions/write_log.php";
require_once "myfunctions/set_hook.php";
require_once "myfunctions/delete_hook.php";



// Ниже напишем конструкцию, которую мы использовали для отлова хуков.
//  Бот будет сразу отвечать на команды, поэтому нам не нужно записывать информацию в лог файл.

// В переменные $textMessage записывает текст сообщения, а в переменную $chatId записываем id чата.

// $data = file_get_contents('php://input');

// $arrDataAnswer = json_decode($data, true);
// $textMessage = mb_strtolower($arrDataAnswer["message"]["text"]);
// $chatId = $arrDataAnswer["message"]["chat"]["id"];

// Массив для передачи параметров в сообщение
/* $getQuery = array(
   "chat_id" => tg_user_id,
   "text" => "Отправляю репли-клавиатуру себе",
   "reply_markup" => json_encode(
      array(
         'keyboard' => array(
            array(array('text' => 'Действие1', 'callback_data' => 'do-1')),
            array(array('text' => 'Действие2', 'callback_data' => 'do-2'))
         ),
         'one_time_keyboard' => true,
         'resize_keyboard' => true,
      )
   )
); */

// Можно просто использовать file_get_contents вместо curl
// $res = file_get_contents("https://api.telegram.org/bot" . tg_token . "/sendMessage?" . http_build_query($getQuery));
// но мы будем пользоваться curl, так как потом все равно без нее не обойдемся
// $res = tg_sendMessage($getQuery);
// prv(json_decode($res));
// $data = file_get_contents('php://input');
// $data = json_decode($data, true);
// prv($data);
// writeLogFile($data, true);
// $res = setMyHook();
// prv($res);
function writeLogFile($string, $clear = false)
{
   $log_file_name = __DIR__ . "/message.txt";
   $now = date("Y-m-d H:i:s");
   if ($clear == false) {
      file_put_contents($log_file_name, $now . " " . print_r($string, true) . "\r\n", FILE_APPEND);
   } else {
      file_put_contents($log_file_name, '');
      file_put_contents($log_file_name, $now . " " . print_r($string, true) . "\r\n", FILE_APPEND);
   }
}
writeLogFile("rrrrrrrrrrrrrrrrrr", true);
// deleteMyHook();

// ssh mikalayt@vh116.hoster.by -p 22   ew8nieKo
