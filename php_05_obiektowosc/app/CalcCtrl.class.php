<?php
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';

class CalcCtrl {
    private $form;
    private $result;
    private $messages;
    private $smarty;

    public function __construct() {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
        $this->messages = new Messages();
        $this->smarty = new Smarty();
    }

    public function getParams() {
        $this->form->amount = $_POST['amount'] ?? null;
        $this->form->years = $_POST['years'] ?? null;
        $this->form->rate = $_POST['rate'] ?? null;
    }

    public function process() {
        
        $this->getParams();

        
        if (!is_numeric($this->form->amount) || !is_numeric($this->form->years) || !is_numeric($this->form->rate)) {
            $this->messages->addError("Wprowadź poprawne dane do kalkulatora.");
            $this->generateView();
            return;
        }

        if ($this->form->rate == 0) {
            $this->messages->addError("Oprocentowanie nie może wynosić 0%.");
            $this->generateView();
            return;
        }

        
        $monthly_rate = $this->form->rate / 100 / 12;
        $months = $this->form->years * 12;
        $monthly_payment = $this->form->amount * $monthly_rate / (1 - pow(1 + $monthly_rate, -$months));
        $total_payment = $monthly_payment * $months;

        
        $this->result->op_name = "Rata miesięczna i całkowity koszt kredytu";
        $this->result->result = "Rata miesięczna: " . round($monthly_payment, 2) . " PLN, Całkowity koszt: " . round($total_payment, 2) . " PLN";

        
        $this->generateView();
    }

    public function generateView() { 
        global $conf;

      
        $this->smarty->assign('conf', $conf);
        $this->smarty->assign('form', $this->form);
        $this->smarty->assign('result', $this->result);
        $this->smarty->assign('errors', $this->messages->getErrors());
        $this->smarty->assign('infos', $this->messages->getInfos());
        $this->smarty->display($conf->root_path.'/app/CalcView.html');
    }
}
?>
