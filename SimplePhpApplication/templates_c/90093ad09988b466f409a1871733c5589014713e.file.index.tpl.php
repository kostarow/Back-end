<?php /* Smarty version Smarty-3.1.14, created on 2014-01-22 11:06:01
         compiled from "templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166364348152df6af59b45d2-51588994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90093ad09988b466f409a1871733c5589014713e' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1390374361,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166364348152df6af59b45d2-51588994',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52df6af5b74526_92947984',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52df6af5b74526_92947984')) {function content_52df6af5b74526_92947984($_smarty_tpl) {?><html>
<head>
    <title>Автомобили</title>
    <link type="text/css" rel="stylesheet" href="css/c.css"/>
</head>
<body>

<div class="container">

    <!-- Войти -->
    <div class="right"><a href="a">Войти</a></div>

    <!-- Выводим список автомобилей -->
    <?php echo $_smarty_tpl->getSubTemplate ('car_list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</div>

</body>
</html>



<?php }} ?>