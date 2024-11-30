<?php
/* Smarty version 4.5.4, created on 2024-11-30 18:38:14
  from 'C:\xampp\htdocs\php66\app\views\templates\main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_674b4d86cb5806_93734269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38226c3fcc5f8ebd5b10545f338e9d3af42fac4d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php66\\app\\views\\templates\\main.html',
      1 => 1732988186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_674b4d86cb5806_93734269 (Smarty_Internal_Template $_smarty_tpl) {
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

      
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/pure-min.css">
    </head>
    <body>
        <div id="page-wrapper">

          
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

          
            <section id="content">
                <div class="container">
                    <br />
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_262502862674b4d86cb3388_70001337', "content");
?>

                </div>
            </section>

            
            <section id="footer">
                <div class="container">
                    <p><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_504915700674b4d86cb3d50_96971142', "footer");
?>
</p>
                </div>
            </section>

        </div>

      
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
class Block_262502862674b4d86cb3388_70001337 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_262502862674b4d86cb3388_70001337',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Domyślna zawartość...<?php
}
}
/* {/block "content"} */
/* {block "footer"} */
class Block_504915700674b4d86cb3d50_96971142 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_504915700674b4d86cb3d50_96971142',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Stopka aplikacji<?php
}
}
/* {/block "footer"} */
}
