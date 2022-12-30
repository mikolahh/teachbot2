<?php

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
