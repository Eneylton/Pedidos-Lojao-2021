<?php

require __DIR__.'/vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = New Dompdf();

$dompdf-> loadHtml('<img style="width:120px; heigth:80px" src="01.png">');

$dompdf-> render();

header('Content-type: application/pdf');

echo $dompdf->output();
