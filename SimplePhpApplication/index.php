
<?php

/*
 В процессе изучения php создавал вот такие простые приложения

*/

// Подключаем свойства и модули
require('conf.php');

// Cписок автомобилей
$car_list = $car->return_list_car();

// Добавляем его в шаблонизатор
$smarty->assign('car_list',$car_list);

// Выводим шаблон
$smarty->display('templates/index.tpl');
