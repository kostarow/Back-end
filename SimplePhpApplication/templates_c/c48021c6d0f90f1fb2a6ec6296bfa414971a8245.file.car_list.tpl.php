<?php /* Smarty version Smarty-3.1.14, created on 2014-01-22 10:58:36
         compiled from "templates/car_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93659129652df6af5b7c0f5-81318901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c48021c6d0f90f1fb2a6ec6296bfa414971a8245' => 
    array (
      0 => 'templates/car_list.tpl',
      1 => 1390373915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93659129652df6af5b7c0f5-81318901',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52df6af5b7e060_17356266',
  'variables' => 
  array (
    'car_list' => 0,
    'car' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52df6af5b7e060_17356266')) {function content_52df6af5b7e060_17356266($_smarty_tpl) {?>

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

            </tr>
        <?php } ?>
    </table>
<?php }else{ ?>
    Записей пока не существует!
<?php }?><?php }} ?>