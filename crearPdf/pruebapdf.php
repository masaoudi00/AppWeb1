<?php

require './vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

require 'crearpdf.php';

$html = ob_get_clean();


$html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
$html2pdf->writeHTML($html);
$html2pdf->output();

?>