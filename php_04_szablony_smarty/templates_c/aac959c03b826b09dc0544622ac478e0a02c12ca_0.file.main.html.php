<?php
/* Smarty version 4.5.4, created on 2024-11-27 18:58:35
  from 'C:\xampp\htdocs\php_04_szablony_smartyy\templates\main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_67475dcb60fff3_83257997',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aac959c03b826b09dc0544622ac478e0a02c12ca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_szablony_smartyy\\templates\\main.html',
      1 => 1732730307,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67475dcb60fff3_83257997 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Kalkulator kredytowy" ?? null : $tmp);?>
</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>
">

        <!-- Style CSS -->
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/ie-old.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/main.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/pure-min.css">
        <!--<![endif]-->

        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    </head>
    <body>
        <div id="page-wrapper">

            <!-- Header -->
            <section id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Logo -->
                            <h1><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/index.php" id="logo"><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Halcyonic" ?? null : $tmp);?>
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_188721207667475dcb6061b1_17432010', "content");
?>

                </div>
            </section>

            <!-- Footer -->
            <section id="footer">
                <div class="container">
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_133368783767475dcb607cf0_79672647', "footer");
?>

                </div>
            </section>

        </div>

        <!-- Scripts -->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/util.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/main.js"><?php echo '</script'; ?>
>
    </body>
</html>
<?php }
/* {block "content"} */
class Block_188721207667475dcb6061b1_17432010 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_188721207667475dcb6061b1_17432010',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Domyślna zawartość...<?php
}
}
/* {/block "content"} */
/* {block "footer"} */
class Block_133368783767475dcb607cf0_79672647 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_133368783767475dcb607cf0_79672647',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <p><?php echo (($tmp = $_smarty_tpl->tpl_vars['footer_text']->value ?? null)===null||$tmp==='' ? "Domyślna stopka aplikacji." ?? null : $tmp);?>
</p>
                    <?php
}
}
/* {/block "footer"} */
}
