<?php

require_once __DIR__ . '/vendor/autoload.php';

$html = '<bookmark content="Start of the Document" /><div>Section 1 text</div>';

$mpdf = new mPDF();

$mpdf->WriteHTML($html);

$mpdf->Output();

?>