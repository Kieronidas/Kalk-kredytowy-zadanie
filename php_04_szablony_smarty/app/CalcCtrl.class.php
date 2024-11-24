<?php
require_once 'CalcForm.class.php';
require_once 'CalcResult.class.php';
require_once dirname(__FILE__).'/../lib/smarty/Smarty.class.php';

class CalcCtrl {
    private $form;
    private $result;
    private $smarty;

    public function __construct() {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(dirname(__FILE__) . '/../templates');
        $this->smarty->setCompileDir(dirname(__FILE__) . '/../templates_c');
    }

    public function getParams() {
        $this->form->amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
        $this->form->interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
        $this->form->years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
    }

    public function validate() {
        if (!isset($this->form->amount) || !isset($this->form->interest) || !isset($this->form->years)) {
            $this->result->errorMessages[] = "All fields are required.";
            return false;
        }

        if (!is_numeric($this->form->amount) || $this->form->amount <= 0) {
            $this->result->errorMessages[] = "Amount must be a positive number.";
        }
        if (!is_numeric($this->form->interest) || $this->form->interest <= 0) {
            $this->result->errorMessages[] = "Interest must be a positive number.";
        }
        if (!is_numeric($this->form->years) || $this->form->years <= 0) {
            $this->result->errorMessages[] = "Years must be a positive number.";
        }

        return empty($this->result->errorMessages);
    }

    public function calculate() {
        $this->result->monthlyPayment = ($this->form->amount * ($this->form->interest / 100)) / (12 * $this->form->years);
    }

    public function process() {
        $this->getParams();
        if ($this->validate()) {
            $this->calculate();
        }
        $this->generateView();
    }

    public function generateView() {
        $this->smarty->assign('form', $this->form);
        $this->smarty->assign('result', $this->result);
        $this->smarty->display('CalcView.tpl');
    }
}
