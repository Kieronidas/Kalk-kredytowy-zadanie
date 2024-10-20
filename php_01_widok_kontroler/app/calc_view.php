<?php require_once dirname(__FILE__) . '/../config.php'; ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator Kredytowy</title>
</head>
<body>

<h2>Kalkulator Kredytowy</h2>
<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
    <label for="id_amount">Kwota kredytu: </label>
    <input id="id_amount" type="text" name="amount" value="<?php print($amount); ?>" /><br />

    <label for="id_years">Liczba lat: </label>
    <input id="id_years" type="text" name="years" value="<?php print($years); ?>" /><br />

    <label for="id_interest">Oprocentowanie (%): </label>
    <input id="id_interest" type="text" name="interest" value="<?php print($interest); ?>" /><br />

    <input type="submit" value="Oblicz ratę" />
</form>

<?php
// Wyświetlenie listy błędów, jeśli istnieją
if (isset($messages)) {
    if (count($messages) > 0) {
        echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
        foreach ($messages as $msg) {
            echo '<li>'.$msg.'</li>';
        }
        echo '</ol>';
    }
}
?>

<?php if (isset($monthlyPayment)) { ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #0f0; width:300px;">
    <?php echo 'Miesięczna rata: '.number_format($monthlyPayment, 2).' PLN'; ?>
</div>
<?php } ?>

</body>
</html>
