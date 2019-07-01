<?php

require_once dirname(__FILE__).'./vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

    require_once "../../core/configGeneral.php";


try {
    ob_start();
    include "../../views/pueba.php";
   // include dirname(__FILE__).'/res/example00.php';
    $content = ob_get_clean();

    $html2pdf = new Html2Pdf(); //Se crea el pdf
    $html2pdf->setDefaultFont('Arial'); //Fuente
    $html2pdf->writeHTML($content); 
    $html2pdf->output('pdf_prueba.pdf'); //Para la salida y nombre del pdf
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}


?>