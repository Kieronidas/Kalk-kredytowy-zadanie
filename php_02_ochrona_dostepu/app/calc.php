<?php
require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH.'/app/security/check.php';


function getParams(&$amount, &$years, &$interest) {
    $amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
    $years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
    $interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
}


function validate(&$amount, &$years, &$interest, &$messages) {
    global $role;

   
    $maxAmount = 800000;
    $minInterest = 6.0; 

   
    if (!isset($amount) || !isset($years) || !isset($interest)) {
        $messages[] = 'Wprowadź wszystkie dane (kwota, liczba lat, oprocentowanie).';
        return false;
    }

  
    $amount = floatval($amount);
    $years = intval($years);
    $interest = floatval($interest);

   
    if ($role == 'user') {
        if ($amount > $maxAmount) {
            $messages[] = 'Kwota przekracza dozwolony limit 800 tysięcy. Skontaktuj się z managerem banku.';
        }
        if ($interest < $minInterest) {
            $messages[] = 'Oprocentowanie nie może być mniejsze niż 6%. Skontaktuj się z managerem banku.';
        }
    }

    
    return count($messages) == 0;
}


function calculateLoan(&$amount, &$years, &$interest, &$result) {
    $monthlyInterest = ($interest / 100) / 12;
    $months = $years * 12;

    if ($monthlyInterest == 0) {
        $result = $amount / $months;
    } else {
        $result = $amount * ($monthlyInterest * pow(1 + $monthlyInterest, $months)) / (pow(1 + $monthlyInterest, $months) - 1);
    }
}

$amount = null;
$years = null;
$interest = null;
$result = null;
$messages = array();

getParams($amount, $years, $interest);
if (validate($amount, $years, $interest, $messages)) {
    calculateLoan($amount, $years, $interest, $result);
}
include 'calc_view.php';
?>