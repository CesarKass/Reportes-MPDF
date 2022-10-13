<?php

// Primer reporte que usa parametros y fonts 
// Necesario crear carpeta custom/temp con permisos "www-data" para almacenar cache de la libreria mpdf v8.1
// o usar el directorio de linux para el cache "www-data" 
require_once __DIR__ . '/vendor/autoload.php'; 

// $nombre = $_GET['v'];

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp']);
// $mpdf = new \Mpdf\Mpdf(['tempDir' => sys_get_temp_dir().DIRECTORY_SEPARATOR.'mpdf']);

$html = 
'
<style>
    .fa { 
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
     }
     .fa-b {
        font-family:fontawesome-b;
     }
</style>
<i class="fa fa-b">&#xf37b;</i>
';

$mpdf->WriteHTML($html);
$mpdf->Output();
