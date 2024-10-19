<?php
// Pobranie danych z formularza z zabezpieczeniem przed błędami
$kwota = isset($_POST['kwota']) ? (float)$_POST['kwota'] : 0;
$lata = isset($_POST['lata']) ? (int)$_POST['lata'] : 0;
$oprocentowanie = isset($_POST['oprocentowanie']) ? (float)$_POST['oprocentowanie'] : 0;

// Walidacja danych wejściowych
if ($kwota <= 0 || $lata <= 0 || $oprocentowanie < 0) {
    echo "Wprowadź poprawne wartości.";
    exit;
}

// Obliczenia
$miesiecznaStopa = ($oprocentowanie / 100) / 12;
$liczbaRat = $lata * 12;

if ($miesiecznaStopa == 0) {
    $rata = $kwota / $liczbaRat;
} else {
    $rata = $kwota * $miesiecznaStopa / (1 - pow(1 + $miesiecznaStopa, -$liczbaRat));
}

$rata = round($rata, 2);

// Wynik
echo "<h2>Wynik kalkulacji</h2>";
echo "Kwota kredytu: {$kwota} zł<br>";
echo "Okres kredytu: {$lata} lata<br>";
echo "Oprocentowanie: {$oprocentowanie}%<br>";
echo "Miesięczna rata: {$rata} zł<br>";
?>
