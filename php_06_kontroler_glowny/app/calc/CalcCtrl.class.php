<?php
require_once dirname(__FILE__).'/../../Config.class.php';
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/app/calc/CalcForm.class.php';
require_once $conf->root_path.'/app/calc/CalcResult.class.php';

class CalcCtrl {
    private $form;
    private $result;
    private $messages;

    public function __construct() {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
        $this->messages = [];
    }

    public function getParams() {
        $this->form->amount = $_REQUEST['amount'] ?? null;
        $this->form->years = $_REQUEST['years'] ?? null;
        $this->form->rate = $_REQUEST['rate'] ?? null;
    }

    public function validate() {
        if (!isset($this->form->amount, $this->form->years, $this->form->rate)) {
            $this->messages[] = "Wypełnij wszystkie pola.";
            return false;
        }

        if (!is_numeric($this->form->amount)) $this->messages[] = "Kwota musi być liczbą.";
        if (!is_numeric($this->form->years)) $this->messages[] = "Liczba lat musi być liczbą.";
        if (!is_numeric($this->form->rate)) $this->messages[] = "Oprocentowanie musi być liczbą.";

        return empty($this->messages);
    }

    public function process() {
        $this->getParams();

        if ($this->validate()) {
            $months = $this->form->years * 12;
            if ($this->form->rate == 0) {
                $this->result->result = $this->form->amount / $months;
            } else {
                $monthly_rate = $this->form->rate / 100 / 12;
                $this->result->result = ($this->form->amount * $monthly_rate) / 
                                        (1 - pow(1 + $monthly_rate, -$months));
            }
        }

        $this->generateView();
    }

    public function generateView() {
        global $conf;

        $smarty = new Smarty();
        $smarty->assign('conf', $conf);
        $smarty->assign('form', $this->form);
        $smarty->assign('messages', $this->messages);
        $smarty->assign('result', $this->result);

        $smarty->display($conf->root_path.'/app/calc/CalcView.html');
    }
}
?>