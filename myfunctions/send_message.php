<?php

/* для отправки текстовых сообщений */
function tg_sendMessage($getQuery)
{
   $ch = curl_init("https://api.telegram.org/bot" . tg_token . "/sendMessage?" . http_build_query($getQuery));
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_HEADER, false);
   $res = curl_exec($ch);
   curl_close($ch);
   return $res;
}
