<?php
function writeLogFile($string, $clear = false)
{
    $log_file_name = __DIR__ . "/message.txt";
    $now = date("Y-m-d H:i:s");
    $data = $string;
    if ($clear == false) {
        file_put_contents($log_file_name, $now . " " . print_r($data, true) . "\r\n", FILE_APPEND);
    } else {
        // file_put_contents($log_file_name, '');
        file_put_contents($log_file_name, $now . " " . print_r($data, true) . "\r\n", FILE_APPEND);
    }
}
