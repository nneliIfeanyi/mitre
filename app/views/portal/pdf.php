<?php
//error_reporting(0);
require_once APPROOT . '/views/TCPDF-main/tcpdf.php';

// create new PDF document
$pdf = new TCPDF('l', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// // set document information
$pdf->setCreator('MITRE Kaduna Nigeria');
$pdf->setAuthor('Nneli Ifeanyi');
$pdf->setTitle('Mitre Administration');
$pdf->setSubject('Mitre Database Management');
$pdf->setKeywords('TCPDF, PDF, Mitre, Stanvic Concepts, Discipleship');

//set default header data
$pdf->setHeaderData('', 30, '              Ministers Improvement And Training Retreat (MITRE)');

//set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', 17));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// // set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// // set margins
$pdf->setMargins(PDF_MARGIN_LEFT, 27, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, 10);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('dejavusans', '', 10);
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// add a page
$pdf->AddPage();
// create some HTML content

$html = '<h4 align="center">Instructors Database</h4>
<table border="1" cellpadding="6" cellspacing="3" style="text-align:left;" >
	<tr  style="font-weight:bold;text-align:center;">
		<th width="41">S/N</th>
		<th width="260">NAMES</th>
		<th width="130">PIC</th>
		<th width="91">ZONE</th>
        <th width="286">ADDRESS</th>
		<th width="126">PHONE</th>
	</tr>';
$count = 1;
foreach ($data['all'] as $all) {
    $path = URLROOT . $all->photo;
    $html .= '<tr style="text-align:center;">
        <td>' . $count . '</td>
        <td>' . $all->name . '</td>
        <td><img src="' . $path . '" border="0" height="60" width="110" align="top" /></td>
        <td>' . $all->zone . '</td>
        <td>' . $all->address . '</td>
        <td>' . $all->phone . '</td>
    </tr>';
    $count++;
}

$html .= '
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
// reset pointer to the last page
$pdf->lastPage();

// Print some HTML Cells

// $html = '<span color="red">red</span> <span color="green">green</span>
//  <span color="blue">blue</span><br /><span color="red">red</span> 
//  <span color="green">green</span> <span color="blue">blue</span>';

// $pdf->setFillColor(255, 255, 0);

// $pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'L', true);
// $pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 1, true, 'C', true);
// $pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'R', true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('table06.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
