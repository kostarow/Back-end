<?php /* Smarty version Smarty-3.1.14, created on 2014-01-23 11:44:03
         compiled from "/home/kostarh/www/php/car/templates/a_index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147034356052dfb3bc7ba7d3-55806719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ef3ac81da39293b89c6623342ad96aad40daa19' => 
    array (
      0 => '/home/kostarh/www/php/car/templates/a_index.tpl',
      1 => 1390463026,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147034356052dfb3bc7ba7d3-55806719',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52dfb3bc7fad44_38483638',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52dfb3bc7fad44_38483638')) {function content_52dfb3bc7fad44_38483638($_smarty_tpl) {?>

<html>
<head>
    <title>Автомобили</title>
    <link type="text/css" rel="stylesheet" href="../css/c.css"/>
</head>
<body>

<div class="container">

    <form id="login_form" method="POST" >

        <label>
            Имя:<input name="name" required />
        </label>
        <br>
        <label>
            Пароль: <input name="password" required />
        </label>
        <br>
        <label>
            Повторите пароль: <input name="password2" required />
        </label>
        <input name="submit" type="submit" value="Создать"/>
    </form>

</div>

</body>
</html>



<?php }} ?>