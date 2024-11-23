<?php
/* Smarty version 4.5.4, created on 2024-11-23 13:41:17
  from 'C:\xampp\htdocs\php_05_objektowosc\templates\calc_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_6741cd6dbb3e30_51635796',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c059ed2f4c8a71beba7f3357b24c4f093b5bb1f6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_05_objektowosc\\templates\\calc_view.tpl',
      1 => 1732365624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6741cd6dbb3e30_51635796 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13384898636741cd6dba3580_11850551', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7978765326741cd6dba5773_60919982', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_13384898636741cd6dba3580_11850551 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_13384898636741cd6dba3580_11850551',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Kalkulator Kredytowy<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_7978765326741cd6dba5773_60919982 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7978765326741cd6dba5773_60919982',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\php_05_objektowosc\\libs\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

<h2>Kalkulator Kredytowy</h2>

<!-- Formularz -->
<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post">
    <label for="id_amount">Kwota kredytu: </label>
    <input id="id_amount" type="text" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
" /><br />

    <label for="id_years">Liczba lat: </label>
    <input id="id_years" type="text" name="years" value="<?php echo $_smarty_tpl->tpl_vars['years']->value;?>
" /><br />

    <label for="id_interest">Oprocentowanie (%): </label>
    <input id="id_interest" type="text" name="interest" value="<?php echo $_smarty_tpl->tpl_vars['interest']->value;?>
" /><br />

    <input type="submit" value="Oblicz ratę" />
</form>

<?php if ($_smarty_tpl->tpl_vars['messages']->value) {?>
<div style="background-color: #f88; padding: 10px;">
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['monthlyPayment']->value) {?>
<div style="background-color: #0f0; padding: 10px;">
    <p>Miesięczna rata: <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['monthlyPayment']->value,2);?>
 PLN</p>
</div>
<?php }
}
}
/* {/block "content"} */
}
