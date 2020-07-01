<?php
$connection = mysqli_connect("localhost", "u0865082_default", "ВАШ ПАРЛЬ БД");
$select_db = mysqli_select_db($connection, 'u0865082_default');
  mysqli_set_charset($connection,"utf8");
if (!$connection) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>