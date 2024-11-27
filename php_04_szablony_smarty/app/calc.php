
<?php
// KONTROLER strony kalkulatora kredytowego
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

//pobranie parametrów
function getParams(&$form){
    $form['amount'] = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
    $form['years'] = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
    $form['rate'] = isset($_REQUEST['rate']) ? $_REQUEST['rate'] : null;
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form,&$infos,&$msgs,&$hide_intro){

    //sprawdzenie, czy parametry zostały przekazane - jeśli nie to zakończ walidację
    if ( ! (isset($form['amount']) && isset($form['years']) && isset($form['rate']) )) return false;    

    $hide_intro = true;

    $infos [] = 'Przekazano parametry.';

    if ( $form['amount'] == "") $msgs [] = 'Nie podano kwoty kredytu';
    if ( $form['years'] == "") $msgs [] = 'Nie podano liczby lat';
    if ( $form['rate'] == "") $msgs [] = 'Nie podano oprocentowania';

    if ( count($msgs) == 0 ) {
        if (! is_numeric( $form['amount'] )) $msgs [] = 'Kwota kredytu nie jest liczbą';
        if (! is_numeric( $form['years'] )) $msgs [] = 'Liczba lat nie jest liczbą';
        if (! is_numeric( $form['rate'] )) $msgs [] = 'Oprocentowanie nie jest liczbą';
    }

    if (count($msgs) > 0) return false;
    else return true;
}

// wykonaj obliczenia
function process(&$form,&$infos,&$msgs,&$result){
    $infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
    
    $amount = floatval($form['amount']);
    $years = intval($form['years']);
    $rate = floatval($form['rate']);

    $monthly_rate = $rate / 100 / 12;
    $months = $years * 12;

    if ($monthly_rate > 0) {
        $result = $amount * ($monthly_rate * pow(1 + $monthly_rate, $months)) / (pow(1 + $monthly_rate, $months) - 1);
    } else {
        $result = $amount / $months; // No interest case
    }
}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;
    
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
    process($form,$infos,$messages,$result);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator kredytowy');
$smarty->assign('page_description','Oblicz swoją miesięczną ratę kredytu');
$smarty->assign('page_header','Kalkulator kredytowy');

$smarty->assign('hide_intro',$hide_intro);

$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.html');
