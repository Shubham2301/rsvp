<?php

function callback($buffer)
{
  // replace all the apples with oranges
  return (str_replace("apples", "oranges", $buffer));
}

ob_start("callback");

?>

<html>
<body>
<p>It's like comparing apples to oranges.</p>
</body>
</html>

<?php

ob_end_flush();


require_once __DIR__ . '/vendor/autoload.php';

$html = '<bookmark content="Start of the Document" /><div>Section 1 text</div>';

$mpdf = new mPDF();

$mpdf->WriteHTML(file_get_contents('htp2.php'));

$mpdf->Output();

?>