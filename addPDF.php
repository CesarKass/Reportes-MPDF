<?php

// Reporte que agrega un PDF externo
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(
    [
        'tempDir' => __DIR__ . '/custom/temp'
    ]);

$pagecount = $mpdf->setSourceFile('logoheader.pdf');
$tplId = $mpdf->importPage($pagecount);
$mpdf->useTemplate($tplId);

// $mpdf->WriteHTML('Hello World');

$mpdf->Output();