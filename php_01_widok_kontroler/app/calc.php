<?php 
// KONTROLER strony kalkulatora kredytowego
require_once dirname(__FILE__) . '/../config.php';

// 1. Pobranie parametrów
$amount = $_REQUEST['amount'];  // Kwota kredytu
$years = $_REQUEST['years'];    // Liczba lat
$interest = $_REQUEST['interest']; // Oprocentowanie

// 2. Walidacja parametrów
$messages = [];

if (!(isset($amount) && isset($years) && isset($interest))) {
    $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ($amount == "") $messages[] = 'Nie podano kwoty kredytu.';
if ($years == "") $messages[] = 'Nie podano liczby lat.';
if ($interest == "") $messages[] = 'Nie podano oprocentowania.';

if (empty($messages)) {
    if (!is_numeric($amount) || $amount <= 0) $messages[] = 'Kwota musi być liczbą większą od zera.';
    if (!is_numeric($years) || $years <= 0) $messages[] = 'Liczba lat musi być większa od zera.';
    if (!is_numeric($interest) || $interest < 0) $messages[] = 'Oprocentowanie musi być liczbą nieujemną.';
}

// 3. Obliczenia, jeśli brak błędów
if (empty($messages)) {
    $loanAmount = floatval($amount);
    $loanYears = intval($years);
    $annualInterestRate = floatval($interest) / 100;
    $monthlyInterestRate = $annualInterestRate / 12;
    $numberOfPayments = $loanYears * 12;

    
    $monthlyPayment = ($loanAmount * $monthlyInterestRate) / 
                      (1 - pow(1 + $monthlyInterestRate, -$numberOfPayments));
}

// 4. Wywołanie widoku z przekazaniem zmiennych
include 'calc_view.php';
?>
