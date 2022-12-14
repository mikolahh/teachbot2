<?php
function writeLogFile($string, $clear = false)
{
    $log_file_name = "/message.txt";
    prv($log_file_name);
    $now = date("Y-m-d H:i:s");
    if ($clear == false) {
        file_put_contents($log_file_name, $now . " " . print_r($string, true) . "\r\n", FILE_APPEND);
    } else {
        file_put_contents($log_file_name, '');
        file_put_contents($log_file_name, $now . " " . print_r($string, true) . "\r\n", FILE_APPEND);
    }
}
