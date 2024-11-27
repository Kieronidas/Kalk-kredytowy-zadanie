
<?php
require_once dirname(__FILE__).'/../Config.class.php';
global $conf;

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';

class CalcCtrl {
    private $form;
    private $result;
    private $messages;

    public function __construct() {
        $this->form = new stdClass();
        $this->result = null;
        $this->messages = [];
    }

    public function process() {
        global $conf;

        // Pobranie parametrów z formularza
        $this->form->amount = $_POST['amount'] ?? null;
        $this->form->years = $_POST['years'] ?? null;
        $this->form->rate = $_POST['rate'] ?? null;

        // Walidacja
        if (!isset($this->form->amount, $this->form->years, $this->form->rate)) {
            $this->messages[] = "Wypełnij wszystkie pola.";
        } else {
            if (!is_numeric($this->form->amount)) $this->messages[] = "Kwota musi być liczbą.";
            if (!is_numeric($this->form->years)) $this->messages[] = "Liczba lat musi być liczbą.";
            if (!is_numeric($this->form->rate)) $this->messages[] = "Oprocentowanie musi być liczbą.";
        }

        // Obliczenia
        if (empty($this->messages)) {
            $this->form->amount = floatval($this->form->amount);
            $this->form->years = floatval($this->form->years);
            $this->form->rate = floatval($this->form->rate);

            $monthly_rate = $this->form->rate / 100 / 12;
            $months = $this->form->years * 12;
            $this->result = ($this->form->amount * $monthly_rate) / 
                            (1 - pow(1 + $monthly_rate, -$months));
        }

        // Przygotowanie Smarty
        $smarty = new Smarty();
        $smarty->assign('conf', $conf);
        $smarty->assign('form', $this->form);
        $smarty->assign('messages', $this->messages);
        $smarty->assign('result', $this->result);

        // Wyświetlenie widoku
        $smarty->display($conf->root_path.'/templates/calc.html');
    }
}
?>
