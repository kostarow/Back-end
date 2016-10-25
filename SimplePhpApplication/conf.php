<?php
/**
 * Created by PhpStorm.
 * User: kostarh
 * Date: 20.01.14
 * Time: 17:59
 */

// Устанавливаем кодировку
header('Content-Type:text/html; charset=utf-8');

$default_template = $_SERVER['DOCUMENT_ROOT'].'/php/car/templates/';

// Подключаем классы
require('class/autoload.php');

// Создаем новое соеденение с БД
$connect = new connect();

// Создаем объект автомобиля
$car = new car();


// Настройка шаблонизатора
require('libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir = 'templates_c/';
$smarty->config_dir = 'configs/';
$smarty->cache_dir = 'cache/';