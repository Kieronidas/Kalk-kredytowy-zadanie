<?php 
// KONTROLER strony kalkulatora kredytowego
session_start(); // Zakładam, że sesja jest wymagana do przechowywania informacji o roli
require_once dirname(__FILE__) . '/../config.php';

include _ROOT_PATH.'/app/security/check.php';

// Inicjalizacja zmiennych
$amount = null;
$years = null;
$interest = null;
$messages = [];
$monthlyPayment = null;

// Sprawdzenie, czy formularz został wysłany metodą POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Pobranie parametrów z formularza
    $amount = $_REQUEST['amount'] ?? null;   // Kwota kredytu
    $years = $_REQUEST['years'] ?? null;     // Liczba lat
    $interest = $_REQUEST['interest'] ?? null; // Oprocentowanie

    // 2. Walidacja parametrów
    // Sprawdzenie, czy wszystkie parametry zostały przekazane
    if (!(isset($amount) && isset($years) && isset($interest))) {
        $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
    }

    if (is_null($amount) || $amount == "") $messages[] = 'Nie podano kwoty kredytu.';
    if (is_null($years) || $years == "") $messages[] = 'Nie podano liczby lat.';
    if (is_null($interest) || $interest == "") $messages[] = 'Nie podano oprocentowania.';

    // Dodatkowa walidacja, gdy wszystkie parametry są obecne
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

        // Sprawdzenie uprawnień do obliczenia maksymalnej raty lub niższego oprocentowania
        if ($interest < 3 || $loanAmount > 1000000) { // przykładowe warunki
            if ($_SESSION['role'] === 'menadżer banku') {
                // Obliczenie miesięcznej raty z niższym oprocentowaniem lub dla wyższej kwoty
                $monthlyPayment = ($loanAmount * $monthlyInterestRate) / 
                                  (1 - pow(1 + $monthlyInterestRate, -$numberOfPayments));
            } else {
                $messages[] = 'Tylko menadżer banku może wyliczyć ratę z niższym oprocentowaniem lub dla wyższej kwoty kredytu.';
            }
        } else {
            // Obliczenie miesięcznej raty dla standardowych warunków
            $monthlyPayment = ($loanAmount * $monthlyInterestRate) / 
                              (1 - pow(1 + $monthlyInterestRate, -$numberOfPayments));
        }
    }
}

// 4. Wywołanie widoku z przekazaniem zmiennych
include 'calc_view.php';
?>
