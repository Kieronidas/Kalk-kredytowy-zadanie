
<?php
// KONTROLER strony kalkulatora kredytowego
session_start();
require_once dirname(__FILE__) . '/../config.php';

// Inicjalizacja zmiennych
$amount = null;
$years = null;
$interest = null;
$messages = [];
$monthlyPayment = null;

// Sprawdzenie, czy formularz został wysłany metodą POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Pobranie parametrów z formularza
    $amount = $_REQUEST['amount'] ?? null;
    $years = $_REQUEST['years'] ?? null;
    $interest = $_REQUEST['interest'] ?? null;

    // 2. Walidacja parametrów
    if (!(isset($amount) && isset($years) && isset($interest))) {
        $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
    }

    if ($amount === null || $amount === "") $messages[] = 'Nie podano kwoty kredytu.';
    if ($years === null || $years === "") $messages[] = 'Nie podano liczby lat.';
    if ($interest === null || $interest === "") $messages[] = 'Nie podano oprocentowania.';

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

        // Obliczenie miesięcznej raty
        if ($monthlyInterestRate > 0) {
            $monthlyPayment = ($loanAmount * $monthlyInterestRate) / 
                              (1 - pow(1 + $monthlyInterestRate, -$numberOfPayments));
        } else {
            $monthlyPayment = $loanAmount / $numberOfPayments;
        }
    }
}

// Inicjalizacja Smarty
require_once _ROOT_PATH . '/libs/smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->setTemplateDir(_ROOT_PATH . '/templates/');
$smarty->setCompileDir(_ROOT_PATH . '/templates_c/');
$smarty->setCacheDir(_ROOT_PATH . '/cache/');
$smarty->setConfigDir(_ROOT_PATH . '/configs/');

// Przypisanie zmiennych do widoku
$smarty->assign('app_url', _APP_URL);
$smarty->assign('root_path', _ROOT_PATH);
$smarty->assign('page_title', 'Kalkulator Kredytowy');
$smarty->assign('page_description', 'Oblicz miesięczną ratę kredytu.');
$smarty->assign('page_header', 'Kalkulator Kredytowy');
$smarty->assign('amount', $amount);
$smarty->assign('years', $years);
$smarty->assign('interest', $interest);
$smarty->assign('monthlyPayment', $monthlyPayment);
$smarty->assign('messages', $messages);
$smarty->assign('base_url', '/przer');


// Wywołanie widoku
$smarty->display('calc_view.tpl');
?>
