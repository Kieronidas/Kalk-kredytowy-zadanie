<?php
/* Smarty version 4.5.4, created on 2024-11-19 21:28:33
  from 'C:\xampp\htdocs\php_04_szablony_smarty\templates\calc_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_673cf4f1b6c1e6_96871077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d976c2adb2e632aa1010f52b4b400191cb4e8b9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_szablony_smarty\\templates\\calc_view.tpl',
      1 => 1732047971,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673cf4f1b6c1e6_96871077 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\php_04_szablony_smarty\\libs\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
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
                        <!-- Zmieniono <a> na zwykły tekst -->
                        <h1 id="logo">Halcyonic</h1>
                        <nav id="nav">
                            <a href="calc.php">Kalkulator</a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kalkulator Kredytowy -->
        <section id="content">
            <div class="container">
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
                <?php }?>
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
}
