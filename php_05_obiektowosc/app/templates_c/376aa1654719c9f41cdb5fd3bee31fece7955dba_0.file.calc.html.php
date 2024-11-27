<?php
/* Smarty version 4.5.4, created on 2024-11-27 20:59:58
  from 'C:\xampp\htdocs\php_05_obiektowosc\templates\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_67477a3e0f6dd5_14432662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '376aa1654719c9f41cdb5fd3bee31fece7955dba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_05_obiektowosc\\templates\\calc.html',
      1 => 1732736265,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67477a3e0f6dd5_14432662 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_126507619467477a3e0e4a27_76069572', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12251193167477a3e0e5706_36314036', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'footer'} */
class Block_126507619467477a3e0e4a27_76069572 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_126507619467477a3e0e4a27_76069572',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<p>Przykładowa treść stopki wpisana do szablonu głównego z szablonu kalkulatora.</p>
<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_12251193167477a3e0e5706_36314036 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12251193167477a3e0e5706_36314036',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\php_05_obiektowosc\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\xampp\\htdocs\\php_05_obiektowosc\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

<h2 class="content-head is-center">Kalkulator kredytowy</h2>

<div class="pure-g">
    <div class="l-box-lrg pure-u-1">
        <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" method="post">
            <fieldset>
                <label for="amount">Kwota kredytu</label>
                <input id="amount" type="text" name="amount" value="<?php if ((isset($_smarty_tpl->tpl_vars['form']->value->amount))) {
echo $_smarty_tpl->tpl_vars['form']->value->amount;
}?>">

                <label for="years">Liczba lat</label>
                <input id="years" type="text" name="years" value="<?php if ((isset($_smarty_tpl->tpl_vars['form']->value->years))) {
echo $_smarty_tpl->tpl_vars['form']->value->years;
}?>">

                <label for="rate">Oprocentowanie (%)</label>
                <input id="rate" type="text" name="rate" value="<?php if ((isset($_smarty_tpl->tpl_vars['form']->value->rate))) {
echo $_smarty_tpl->tpl_vars['form']->value->rate;
}?>">

                <button type="submit" class="pure-button">Oblicz</button>
            </fieldset>
        </form>
    </div>

    <div class="l-box-lrg pure-u-1 pure-u-med-3-5">
        <?php if ((isset($_smarty_tpl->tpl_vars['messages']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?>
            <h4>Wystąpiły błędy:</h4>
            <ul class="error-list">
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
        <?php }?>

        <?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
            <h4>Miesięczna rata kredytu:</h4>
            <p class="result"><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['result']->value,2);?>
</p>
        <?php }?>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
