
 <?php //require_once dirname(__FILE__) .'/../config.php';  ?>
 
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>
    

<div style="width:90%; margin: 2em auto;">
    <a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">Kolejna chroniona strona</a>
    <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_URL); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
    <legend>Kalkulator kredytowy</legend>
    <fieldset>
        <label for="id_amount">Kwota kredytu: </label>
        <input id="id_amount" type="text" name="amount" value="<?php out($amount) ?>" />

        <label for="id_years">Liczba lat: </label>
        <input id="id_years" type="text" name="years" value="<?php out($years) ?>" />

        <label for="id_interest">Oprocentowanie (% roczne): </label>
        <input id="id_interest" type="text" name="interest" value="<?php out($interest) ?>" />
    </fieldset>
    <input type="submit" value="Oblicz ratę" class="pure-button pure-button-primary" />
</form>

<?php

if (isset($messages)) {
    if (count($messages) > 0) {
        echo '<ol style="margin-top: 1em; padding: 1em; background-color: #f88; border-radius: 0.5em; width:25em;">';
        foreach ($messages as $msg) {
            echo '<li>'.$msg.'</li>';
        }
        echo '</ol>';
    }
}
?>

<?php if (isset($result)){ ?>
<div style="margin-top: 1em; padding: 1em; background-color: #ff0; border-radius: 0.5em; width:25em;">
    <?php echo 'Miesięczna rata: '.number_format($result, 2, ',', ' ') . ' zł'; ?>
</div>
<?php } ?>

</div>

</body>
</html>