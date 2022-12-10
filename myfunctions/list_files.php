<?php 

// Добавляем дополнительную функцию, которая выводит список всех файлов из директории. Данная функция будет отдавать массив с файлами, для последующего отправления рандомного файла в чат.

function list_files($path) {
    if ($path[mb_strlen($path) - 1] != '/') {
	$path .= '/';
    }
 
    $files = array();
    $dh = opendir($path);
    while (false !== ($file = readdir($dh))) {
	if ($file != '.' && $file != '..' && !is_dir($path.$file) && $file[0] != '.') {
	    $files[] = $file;
	}
    }
 
    closedir($dh);
    return $files;
}