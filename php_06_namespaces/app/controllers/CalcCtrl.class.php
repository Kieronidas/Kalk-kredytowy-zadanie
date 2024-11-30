<?php

namespace app\controllers;


use app\forms\CalcForm;
use app\transfer\CalcResult;

/** Kontroler kalkulatora kredytowego */
class CalcCtrl {

    private $form;   // dane formularza (do obliczeń i dla widoku)
    private $result; // dane dla widoku

    /** Konstruktor - inicjalizacja */
    public function __construct() {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

    /** Pobranie parametrów */
    public function getParams() {
        $this->form->amount = getFromRequest('amount');
        $this->form->years = getFromRequest('years');
        $this->form->rate = getFromRequest('rate');
    }

    /** Walidacja parametrów */
    public function validate() {
        if (!isset($this->form->amount) || !isset($this->form->years) || !isset($this->form->rate)) {
            getMessages()->addInfo('DEBUG: Rozpoczęto walidację.');
            return false; // brak wymaganych parametrów
        }

        if ($this->form->amount === "" || $this->form->years === "" || $this->form->rate === "") {
            getMessages()->addError('Wszystkie pola są wymagane!');
            return false;
        }

        if (!is_numeric($this->form->amount) || !is_numeric($this->form->years) || !is_numeric($this->form->rate)) {
            getMessages()->addError('Nieprawidłowy format wartości liczbowych!');
            getMessages()->addError('Wartości muszą być liczbami!');
         
            return false;
        }

        if ($this->form->years <= 0 || $this->form->rate < 0) {
            getMessages()->addError('Liczba lat musi być większa od 0, a oprocentowanie nie może być ujemne!');
            return false;
        }

        return true;
    }

    /** Obliczenie raty kredytowej */
    public function process() {
        $this->getParams();
        getMessages()->addInfo('DEBUG: Wywołano process()');
        getMessages()->addInfo('Wywołano process() w CalcCtrl');

        if ($this->validate()) {
            getMessages()->addInfo('DEBUG: Walidacja zakończona sukcesem');
            getMessages()->addInfo('Walidacja zakończona sukcesem');

            $P = floatval($this->form->amount);
            $n = intval($this->form->years) * 12; // liczba miesięcy
            $r = floatval($this->form->rate) / 100 / 12; // oprocentowanie miesięczne

            if ($r > 0) {
                $this->result->rata = ($P * $r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);
                getMessages()->addInfo('DEBUG: Obliczona rata: ' . $this->result->rata);
                getMessages()->addInfo('Rata kredytu obliczona: ' . $this->result->rata);
            } else {
                $this->result->rata = $P / $n;
                getMessages()->addInfo('DEBUG: Obliczona rata: ' . $this->result->rata);
                getMessages()->addInfo('Rata kredytu obliczona: ' . $this->result->rata); // rata przy 0% oprocentowania
            }

            getMessages()->addInfo('Obliczenia wykonano poprawnie.');
        }

        $this->generateView();
    }

    /** Wygenerowanie widoku */
    public function generateView() {
        getSmarty()->assign('page_title', 'Kalkulator kredytowy');
        getSmarty()->assign('page_description', 'Aplikacja oblicza miesięczną ratę kredytową.');
        getSmarty()->assign('page_header', 'Kalkulator kredytowy - Oblicz ratę');

        getSmarty()->assign('form', $this->form);
        getSmarty()->assign('res', $this->result);
        getSmarty()->assign('messages', getMessages());
        getSmarty()->display('CalcView.html');
    }
}
?>
