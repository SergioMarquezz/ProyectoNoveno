<?php

require_once __DIR__ . '/vendor/autoload.php';
include_once "../views/includes/fecha.php";
require_once "../models/mainModel.php";

//Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();


$concepto = $_POST['concepto'];
$name = $_POST['name-completo'];
$control = $_POST['num-control'];
$carrera = $_POST['carrera'];
$referencia = $_POST['referencia'];
$validez = $_POST['valida'];
$pago = $_POST['cantidad'];




/*$html = "

<style>

    .table-bordered{
        border: 2px solid #D3D3D3;
        margin-top: 40px;
    }

    th,td{
        border: 2px solid #D3D3D3;
        width: 3.5in;
        text-align: center;
    }

    th{
        text-align: left;
    }


</style>

    <table class='table table-bordered'>
        
        <tbody>
            <tr>
                <th>Nombre</th>
                <th>No. Control</th>
            </tr>
            <tr>
                <td>".$name."</td>
                <td>".$control."</td>
            </tr>
            <tr>
                <th>Carrera</th>
                <th>Concepto</th>
            </tr>
            <tr>
                <td>".$carrera."</td>
                <td>".$concepto."</td>
            </tr>
            <tr>
                <th>Referencia</th>
                <th>Válida hasta</th>
            </tr>
            <tr>
                <td>".$referencia."</td>
                <td>".$validez."</td>
            </tr>
            <tr >
                <th colspan='2'>Cantidad a pagar</th>
            </tr>
            <tr>
                <td colspan='2'>".$pago."</td>
            </tr>
        </tbody>
    </table>
";*/



/*$mpdf->Ln(48);
$mpdf->SetTextColor(255, 87, 51);
$mpdf->Cell(120,5,"Nombre:",0,0,'C');*/
//$mpdf->SetTextColor(1,1,126);
//$mpdf->WriteCell(50,5,$fecha,'LRBT',0,'C');
$mpdf->WriteHTML("");
$mpdf->Image('../views/img/REFERENCIA BANCARIA alumno.png', 0, 0, 210, 150, 'png', '', true, false);
// Output a PDF file directly to the browser
$mpdf->Output();


