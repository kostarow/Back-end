<?php /* Smarty version Smarty-3.1.14, created on 2014-01-23 11:05:46
         compiled from "/home/kostarh/www/php/car/templates/a_car_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114606427252e0bf4a697616-32119989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b9ef41d11771884df4d9c4b92b84b2bc6ed92ec' => 
    array (
      0 => '/home/kostarh/www/php/car/templates/a_car_list.tpl',
      1 => 1390373915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114606427252e0bf4a697616-32119989',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'car_list' => 0,
    'car' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52e0bf4a756064_48680120',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e0bf4a756064_48680120')) {function content_52e0bf4a756064_48680120($_smarty_tpl) {?>

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
<?php }?><?php }} ?>