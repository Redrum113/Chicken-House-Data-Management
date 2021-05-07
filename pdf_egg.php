<?php

require_once('assets/tcpdf/tcpdf.php');
session_start();
require("function/function.php");

$houses_id = $_POST["houses_id"];
$dateStart = $_POST["dateStart"];
$dateEnd = $_POST["dateEnd"];
$pdfDataReportEgg = getPdfDataReportEgg($houses_id,$dateStart,$dateEnd);
$currentHouse = getCurrentHouse($houses_id);

$type_map = array(1 => '<a style="color:red">ไก่ไข่</a>', 2 => '<a style="color:green">ไก่พันธุ์</a>');


//$currentMonth = date("m");
//$currentDate = '<h5 align="right">วันที่ออกรายงาน '.dateThaiFull(date("Y-m-d")).'</h5>';
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('ระบบบริหารจัดการข้อมูลการออกไข่ของไก่ในโรงเรือน');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------
// set font

//$fontname = $pdf->addTTFfont('fonts/Browa.ttf', 'TrueTypeUnicode', '', 32);
$pdf->SetFont('cordiaupc', '', 12, '', true);


$line_html="";
$line_html1="";
//PAGE 3 >> PAGE 1
$pdf->AddPage();

$pdf->setPageOrientation ('L', $autopagebreak='', $bottommargin='');
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(true, 0);
// Set some content to print

$total = 0;
$count = 0;
$i = 0;

foreach($pdfDataReportEgg as $data){

    $count++;
    $i++;
    $total += $data["amount_egg"];
    $line_html1  .= <<<EOD
        <tr>
            <td style="text-align:center;">{$i}</td>
            <td style="text-align:center;">{$data['date_keep']}</td>
            <td style="text-align:center;">{$data['house_name']}</td>
            <td style="text-align:center;">{$data['chicken_number']}</td>
            <td style="text-align:center;">{$data['coop_id']}</td>
            <td style="text-align:center;">{$type_map[$data["chicken_type"]]}</td>
            <td style="text-align:center;">{$data['breed_name']}</td>
            <td style="text-align:center;">{$data['amount_egg']}</td>
        </tr>
        

EOD;
    }

$header_html  .= <<<EOD
<div style="text-align:center;margin:0"><b style="font-size:26px;">รายงานการเก็บไข่จาก {$currentHouse["house_name"]}</b><br /><b style="font-size:26px;">จากวันที่ {$dateStart} ถึง {$dateEnd}</b></div>
EOD;

$body_html  .= <<<EOD
<table border="0">
    <tr>
        <td style="border-bottom: 1px solid #000;text-align:center;border-top: 1px solid #000;">ลำดับ</td>
        <td style="border-bottom: 1px solid #000;text-align:center;border-top: 1px solid #000;">วันที่</td>
        <td style="border-bottom: 1px solid #000;text-align:center;border-top: 1px solid #000;">โรงเรือน</td>
        <td style="border-bottom: 1px solid #000;text-align:center;border-top: 1px solid #000;">รหัสไก่</td>
        <td style="border-bottom: 1px solid #000;text-align:center;border-top: 1px solid #000;">กรง</td>
        <td style="border-bottom: 1px solid #000;text-align:center;border-top: 1px solid #000;">ประเภท</td>
        <td style="border-bottom: 1px solid #000;text-align:center;border-top: 1px solid #000;">สายพันธ์</td>
        <td style="border-bottom: 1px solid #000;text-align:center;border-top: 1px solid #000;">จำนวนไข่</td>
        
    </tr>
    {$line_html1}
    
</table>
<br/>
<table>
    <tr>
        <td colspan="4" style="text-align:right;">รวมทั้งหมด</td>
        <td style="text-align:center;">{$total}</td>
        <td style="text-align:left;">ฟอง</td>
    </tr>
    
</table>
EOD;

$html = <<<EOD
{$header_html}
{$body_html}
<div style="text-align:center;">
</div>
EOD;


// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_end_clean();
$pdf->Output('รายงาน.pdf', 'I');
?>

<?php die(); ?>
