<?php
// KONTROLER strony kalkulatora kredytowego
session_start();
require_once dirname(__FILE__) . '/../config.php';

include _ROOT_PATH . '/app/security/check.php';

// Funkcje
function getInputs() {
    return [
        'amount' => $_REQUEST['amount'] ?? null,
        'years' => $_REQUEST['years'] ?? null,
        'interest' => $_REQUEST['interest'] ?? null,
    ];
}

function validateInputs($amount, $years, $interest) {
    $messages = [];
    if (is_null($amount) || $amount == "") $messages[] = 'Nie podano kwoty kredytu.';
    if (is_null($years) || $years == "") $messages[] = 'Nie podano liczby lat.';
    if (is_null($interest) || $interest == "") $messages[] = 'Nie podano oprocentowania.';

    if (empty($messages)) {
        if (!is_numeric($amount) || $amount <= 0) $messages[] = 'Kwota musi być liczbą większą od zera.';
        if (!is_numeric($years) || $years <= 0) $messages[] = 'Liczba lat musi być większa od zera.';
        if (!is_numeric($interest) || $interest < 0) $messages[] = 'Oprocentowanie musi być liczbą nieujemną.';
    }

    return $messages;
}

function calculateMonthlyPayment($amount, $years, $interest) {
    $loanAmount = floatval($amount);
    $loanYears = intval($years);
    $annualInterestRate = floatval($interest) / 100;
    $monthlyInterestRate = $annualInterestRate / 12;
    $numberOfPayments = $loanYears * 12;

    return ($loanAmount * $monthlyInterestRate) / 
           (1 - pow(1 + $monthlyInterestRate, -$numberOfPayments));
}

function checkPermissions($amount, $interest, $role) {
    if ($interest < 3 || $amount > 1000000) {
        if ($role !== 'menadżer banku') {
            return 'Tylko menadżer banku może wyliczyć ratę z niższym oprocentowaniem lub dla wyższej kwoty kredytu.';
        }
    }
    return null;
}

// Logika kontrolera
$inputs = null;
$messages = [];
$monthlyPayment = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputs = getInputs();
    $messages = validateInputs($inputs['amount'], $inputs['years'], $inputs['interest']);

    if (empty($messages)) {
        $permissionError = checkPermissions($inputs['amount'], $inputs['interest'], $_SESSION['role']);
        if ($permissionError) {
            $messages[] = $permissionError;
        } else {
            $monthlyPayment = calculateMonthlyPayment($inputs['amount'], $inputs['years'], $inputs['interest']);
        }
    }
}

// Wywołanie widoku z przekazaniem zmiennych
include 'calc_view.php';
?>
