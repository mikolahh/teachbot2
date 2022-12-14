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
define("botUrl", "https://bot.mikalay.tech/index.php");


// Теперь давайте проверим работу нашего обработчика. Сообщения приходят POST-запросом, с типом application/json. Получить его в PHP можно следующим образом:
// И тут снова наша замечательная функция file_get_contents. При помощи не менее замечательного папраметра php://input мы можем отлавливать любые запросы: "PUT", "DELETE", etc. В данном случае сообщения боту приходят POST-запросом, что указано выше
// $data = file_get_contents('php://input');
// А теперь преобразуем json-строку в ассоциативный массив
// $data = json_decode($data, true);
// если бы второй параметр был false, мы бы получили объект

// А теперь попробуем красиво вывести данные с сообщением боту
// prv($data); и у нас ничего не выходит, так как данные, которые мы пытаемся отловить сразу же уходят в пустоту

// Теперь мы должны придумать, куда будем сохранять полученные данные, так как скрипты будут выполняться в рандомный момент и если мы не запишем данные, то они пропадут в пустоту. Для записи ответа можно и нужно использовать БД, но пока просто запишем массив в файл txt. Преобразовывать j-son строку в массив мы уже не будем

// Для записи строки будем использовать дополнительную, самописную функцию writeLogFile()
// функция принимает 2 параметра: первый параметр, строка для записи. В нашем случае это JSON строка. второй параметр используется для очистки файла и перезаписи. Если данный параметр имеет значение false, то в файл дописывается информация.
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
// Теперь отлавливаем данные
$data = file_get_contents('php://input');
// А теперь преобразуем json-строку в ассоциативный массив
$data = json_decode($data, true);
// И сразу записываем полученные данные в файл
writeLogFile($data);
// И только теперь, уже из файла, выведем полученную информацию на страницу
// echo file_get_contents(__DIR__ . "/message.txt");
prv(file_get_contents(__DIR__ . "/message.txt"));








// ssh mikalayt@vh116.hoster.by -p 22   ew8nieKo
// mikolahh@gmail.com
