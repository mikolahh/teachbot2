<?php


/* для получения данных о файле */
function TG_getFile($arrayQuery) {
    $ch = curl_init("https://api.telegram.org/bot". tg_token ."/getFile?" . http_build_query($arrayQuery));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $res = curl_exec($ch);
    curl_close($ch);

    return $res;
}
