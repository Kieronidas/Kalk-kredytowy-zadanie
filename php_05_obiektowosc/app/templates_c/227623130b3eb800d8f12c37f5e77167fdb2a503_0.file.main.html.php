<?php
/* Smarty version 4.5.4, created on 2024-11-27 20:37:51
  from 'C:\xampp\htdocs\php_04_szablony_smartyy\templates\main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_6747750f7c8873_09922295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '227623130b3eb800d8f12c37f5e77167fdb2a503' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_szablony_smartyy\\templates\\main.html',
      1 => 1732736265,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6747750f7c8873_09922295 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['conf']->value->page_title ?? null)===null||$tmp==='' ? "Kalkulator kredytowy" ?? null : $tmp);?>
</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['conf']->value->page_description ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>
">

        <!-- Style CSS -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/pure-min.css">
    </head>
    <body>
        <div id="page-wrapper">

            <!-- Header -->
            <section id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/index.php" id="logo"><?php echo (($tmp = $_smarty_tpl->tpl_vars['conf']->value->page_title ?? null)===null||$tmp==='' ? "Kalkulator kredytowy" ?? null : $tmp);?>
</a></h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Content -->
            <section id="content">
                <div class="container">
                    <br />
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16841285056747750f7c64d0_55103150', "content");
?>

                </div>
            </section>

            <!-- Footer -->
            <section id="footer">
                <div class="container">
                    <p><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15238912946747750f7c6c16_05532357', "footer");
?>
</p>
                </div>
            </section>

        </div>

        <!-- Scripts -->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/util.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/main.js"><?php echo '</script'; ?>
>
    </body>
</html>
<?php }
/* {block "content"} */
class Block_16841285056747750f7c64d0_55103150 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16841285056747750f7c64d0_55103150',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Domyślna zawartość...<?php
}
}
/* {/block "content"} */
/* {block "footer"} */
class Block_15238912946747750f7c6c16_05532357 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_15238912946747750f7c6c16_05532357',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Stopka aplikacji<?php
}
}
/* {/block "footer"} */
}
