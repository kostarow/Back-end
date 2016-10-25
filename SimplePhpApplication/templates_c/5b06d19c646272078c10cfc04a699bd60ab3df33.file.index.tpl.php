<?php /* Smarty version Smarty-3.1.14, created on 2014-01-21 19:09:27
         compiled from "smarty/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17619913452dd3a15d94b28-96489747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b06d19c646272078c10cfc04a699bd60ab3df33' => 
    array (
      0 => 'smarty/templates/index.tpl',
      1 => 1390316714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17619913452dd3a15d94b28-96489747',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52dd3a15ddaab0_81090316',
  'variables' => 
  array (
    'car_list' => 0,
    'car' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52dd3a15ddaab0_81090316')) {function content_52dd3a15ddaab0_81090316($_smarty_tpl) {?><html>
<head>
    <title>Автомобили</title>
    <link type="text/css" rel="stylesheet" href="css/c.css"/>
</head>
<body>

<form id="form_add_car"  method="post">

    <input name="car_model" placeholder="Марка машины" required/><br>

    <input name="year" placeholder="Год выпуска" required maxlength="4"/><br>

    <input name="milage" placeholder="Пробег (км)" required/><br>

    <textarea rows="5" name="text" placeholder="Описание"  required/></textarea><br>

    <input name="city" placeholder="Город" required/><br>

    <input name="add_car" type="submit" value="Добавить"/>

</form>

<?php echo $_smarty_tpl->getSubTemplate ('car_list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php if ($_smarty_tpl->tpl_vars['car_list']->value){?>
    <table class="table_car">

        <tr class="table_toc">
            <td>Марка машины</td>
            <td>Год выпуска</td>
            <td>Пробег</td>
            <td>Описание</td>
            <td>Город</td>
        </tr>

        <?php  $_smarty_tpl->tpl_vars['car'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['car']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['car_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['car']->key => $_smarty_tpl->tpl_vars['car']->value){
$_smarty_tpl->tpl_vars['car']->_loop = true;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['car']->value[0];?>
</td>

                <td><?php echo $_smarty_tpl->tpl_vars['car']->value[1];?>
</td>

                <td><?php echo $_smarty_tpl->tpl_vars['car']->value[2];?>
</td>

                <td><?php echo $_smarty_tpl->tpl_vars['car']->value[3];?>
</td>

                <td><?php echo $_smarty_tpl->tpl_vars['car']->value[4];?>
</td>

                <td><a href="index.php?car_id=<?php echo $_smarty_tpl->tpl_vars['car']->value['id'];?>
"><img title="Удалить" src="img/but_del.png"/></a></td>
            </tr>
        <?php } ?>
    </table>
<?php }else{ ?>
    Записей пока не существует!
<?php }?>


</body>
</html>



<?php }} ?>