<?php /* Smarty version Smarty-3.1.14, created on 2014-01-23 12:27:15
         compiled from "/home/kostarh/www/php/car/templates/a.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70877893552dfd95da66502-56659538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f242aa29e896b22cbe274f02fba7009faefc0278' => 
    array (
      0 => '/home/kostarh/www/php/car/templates/a.tpl',
      1 => 1390465357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70877893552dfd95da66502-56659538',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52dfd95dabde42_18591461',
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52dfd95dabde42_18591461')) {function content_52dfd95dabde42_18591461($_smarty_tpl) {?><html>
<head>
    <title>Автомобили - редактирование</title>
    <link type="text/css" rel="stylesheet" href="../css/c.css"/>
</head>
<body>

<div class="container">

<?php if (!$_smarty_tpl->tpl_vars['user']->value){?>
    <a href="register.php">Создать пользователя</a>

    <form id="form_add_car"  method="post">

        <input name="car_model" placeholder="Марка машины" required/><br>

        <input name="year" placeholder="Год выпуска" required maxlength="4"/><br>

        <input name="milage" placeholder="Пробег (км)" required/><br>

        <textarea rows="5" name="text" placeholder="Описание"  required/></textarea><br>

        <input name="city" placeholder="Город" required/><br>

        <input name="add_car" type="submit" value="Добавить"/>

    </form>

    <?php echo $_smarty_tpl->getSubTemplate ('../templates/a_car_list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php }else{ ?>

    <?php echo $_smarty_tpl->getSubTemplate ('../templates/login.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php }?>


</div>

</body>
</html><?php }} ?>