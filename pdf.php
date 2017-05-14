<?php 
    
    <link rel="stylesheet" type="text/css" href="styling.css"></link>
    $db= mysqli_connect('localhost','root','','guests') or die("error connecting to mysqli server"); 
    require_once __DIR__ . '/vendor/autoload.php';

    $sql = 'SELECT * FROM data';
    $req = mysqli_query($db,$sql) or die('Error SQL!'.$sql.'<br>'.mysqli_error());   

    $mpdf=new mPDF(); 
    $html_string = '<table border=1 id="guest_list_table">';
    $html_string .= getTemplateHeaderRow();
    while($row = mysqli_fetch_assoc($req))
    {
        $html_string .= getRowHTML($row);
    }
    $html_string .= '</table>';
    $mpdf->WriteHTML($html_string);
    $mpdf->Output();
    function getTemplateHeaderRow()
    {
        $html = '<tr>';
        $html .= '<th>Name</th>';
        $html .= '<th>Phone</th>';
        $html .= '<th>Status</th>';
        $html .= '</tr>';
        return $html;
    }

    function getRowHTML($row)
    {
        $html = '<tr>';
        $html .= '<td>' . $row['name'] . '</td>';
        $html .= '<td>' . $row['phone'] . '</td>';
        $html .= '<td>' . $row['status'] . '</td>';
        $html .= '</tr>';
        return $html;
    }
?>