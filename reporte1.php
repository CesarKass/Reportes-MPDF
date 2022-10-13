<?php

// Reporte que agrega iconos usando la ibreria Font Awesome v5
require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf(
    [
        'tempDir' => __DIR__ . '/custom/temp',
        'fontDir' => array_merge($fontDirs, [
            __DIR__ . '/custom/fonts/mpdf',
        ]),
        'fontdata' => $fontData + [
            'fontawesome' => [ 
                'R' => 'fa-brands-400.ttf',
                'B' => 'fa-solid-900.ttf',
                'I' => 'fa-regular-400.ttf',
            ],
        ],
        'default_font' => 'arial',
        'format' => 'letter'
    ]
); 
 
    // brands
    // <i class="fa">&#xf09a;</i> 
    // solid
    // <i class="fa fa-b">&#xf58c;</i>
    // regular
    // <i class="fa fa-i">&#xf58c;</i>
    // 4 

$html = 
'
<style> .fa { display: inline-block; font-style: normal; font-variant: normal; text-rendering: auto; -webkit-font-smoothing: antialiased; font-family:fontawesome; } .fa-i { font-style: italic; } .fa-b { font-weight: bold; } </style>

<i class="fa">&#xf09a;</i> 

<i class="fa fa-b">&#xf58c;</i>
<i class="fa fa-b">&#xf007;</i>
<i class="fa fa-b">&#xf073;</i>

<i class="fa fa-i">&#xf58c;</i>
<i class="fa fa-i">&#xf073;</i>

';

$mpdf->WriteHTML($html);
$mpdf->Output();

