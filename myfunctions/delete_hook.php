<?php
function deleteMyHook($botUrl = "https://bot.mikalay.tech")
{
   // Формируем массив с параметрами запроса на установку хука
   $getQuery = array(
      "url" => botUrl,
   );
   // формируем сам запрос на установку хука с поощью curl
   $ch = curl_init(apiUrl . tg_token . "/deleteWebhook?" . http_build_query($getQuery));
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

   // Красиво выводим результаты запроса об его успешности либо напротив
   prv($resultQuery);
   writeLogFile($resultQuery);
}
