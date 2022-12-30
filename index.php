<?php
// Определяем id меня
define("tg_user_id", "902636138");
// Определяем id моей группы
define("tg_group_id", "-881391231");
define("apiUrl", "https://api.telegram.org/bot");
define("tg_token", "5653090500:AAFR7_OQ6-d_I0A8t-uItzW17sEf3PTFiXg");
require_once "myfunctions/errors.php";
require_once "myfunctions/get_file.php";
require_once "myfunctions/list_files.php";
require_once "myfunctions/prv.php";
require_once "myfunctions/send_message.php";
require_once "myfunctions/send_photo.php";
require_once "myfunctions/write_log.php";
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
$getQuery = array(
   "chat_id" => tg_user_id,
   "text" => "Отправляю еще одну инлайн-клавиатуру себе уже с помощью curl",
   "reply_markup" => json_encode(
      array(
         'inline_keyboard' => array(
            array(
               array('text' => 'Действие3', 'callback_data' => 'do-3'),
               array('text' => 'Действие4', 'callback_data' => 'do-4')
            )
         )
      )
   )
);

// Можно просто использовать file_get_contents вместо curl
// $res = file_get_contents("https://api.telegram.org/bot" . tg_token . "/sendMessage?" . http_build_query($getQuery));
// prv(json_decode($res));
// но мы будем пользоваться curl, так как потом все равно без нее не обойдемся
$res = tg_sendMessage($getQuery);
prv(json_decode($res));

// $data = file_get_contents('php://input');
// $data = json_decode($data, true);

// writeLogFile($data, true);
// prv(file_get_contents('message.txt'));








// ssh mikalayt@vh116.hoster.by -p 22   ew8nieKo
