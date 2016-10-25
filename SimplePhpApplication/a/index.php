<?php

// Подключаем файл конфигурации
require('../conf.php');

// Создаем объект пользователя
require_once('../class/Login.php');
$login = new Login();

// При нажатии на кнопку войти в систему
if(isset($_POST['submit_login']))
{

}

//Говорим шаблону, есть ли пользователи
$smarty->assign('user',$login->table_empty);

// Находим список автомобилей
$smarty->assign('car_list',$car->return_list_car());

// Выводим шаблон
$smarty->display($default_template.'a.tpl');

//$smarty->display($default_template.'a_index.tpl');
