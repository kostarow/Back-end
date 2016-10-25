<?php /* Smarty version Smarty-3.1.14, created on 2014-01-23 12:27:15
         compiled from "/home/kostarh/www/php/car/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132216568752e0d2638d2b22-17502069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfdb444b37c20f7482e3813452cb5cfa6664833a' => 
    array (
      0 => '/home/kostarh/www/php/car/templates/login.tpl',
      1 => 1390465634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132216568752e0d2638d2b22-17502069',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52e0d2638d5865_43014118',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e0d2638d5865_43014118')) {function content_52e0d2638d5865_43014118($_smarty_tpl) {?>

<form method="post">
    <h2 style="text-align: center">Авторизация</h2>
    <label>Имя: <input name="name" required /></label><br>
    <label>Пароль:<input name="password" required/></label><br>
    <input type="submit" name="submit" value="Войти"/>
</form><?php }} ?>