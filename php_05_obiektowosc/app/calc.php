
<?php
require_once dirname(__FILE__).'/../config.php'; // Ładowanie konfiguracji
require_once $conf->root_path.'/app/CalcCtrl.class.php'; // Korzystanie ze ścieżki zdefiniowanej w $conf

$ctrl = new CalcCtrl();
$ctrl->process();
?>
