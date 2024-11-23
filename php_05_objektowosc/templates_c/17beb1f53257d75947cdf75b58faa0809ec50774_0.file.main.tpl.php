<?php
/* Smarty version 4.5.4, created on 2024-11-23 13:41:17
  from 'C:\xampp\htdocs\php_05_objektowosc\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_6741cd6dcea706_25095739',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17beb1f53257d75947cdf75b58faa0809ec50774' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_05_objektowosc\\templates\\main.tpl',
      1 => 1732365624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6741cd6dcea706_25095739 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3867204496741cd6dce9819_64917165', "title");
?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/main.css" />
</head>
<body>
    <div id="page-wrapper">

        <!-- Header -->
        <section id="header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 id="logo">Halcyonic</h1>
                        <nav id="nav">
                            <a href="calc.php">Kalkulator</a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content -->
        <section id="content">
            <div class="container">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9959189996741cd6dcea247_26151116', "content");
?>

            </div>
        </section>

        <!-- Footer -->
        <section id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>&copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a></p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>
</html>
<?php }
/* {block "title"} */
class Block_3867204496741cd6dce9819_64917165 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_3867204496741cd6dce9819_64917165',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Tytuł strony<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_9959189996741cd6dcea247_26151116 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_9959189996741cd6dcea247_26151116',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}
