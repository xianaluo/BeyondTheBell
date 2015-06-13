<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/13/15
 * Time: 5:11 PM
 */


require APPPATH.'third_party/tcpdf/config/tcpdf_config.php';
require APPPATH.'third_party/tcpdf/tcpdf.php';


class Pdfwrapper {


    public function __construct(){


    }

    public function reportAttend($data) {

// create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
        $pdf->SetCreator("BeyondTheBell");
        $pdf->SetAuthor('BeyondTheBell');
        $pdf->SetTitle('Report');
        $pdf->SetSubject('Attendance');
        $pdf->SetKeywords('');

// set default header data
        $period = "";
        if($data['startDate']) {
            $period .= "From: ".$data['startDate'];
        }
        if($data['endDate']) {
            $period .= " To: ".$data['endDate'];
        }
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Attendance Report', $period);

// set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

// ---------------------------------------------------------

// set font
        $pdf->SetFont('helvetica', '', 12);

// add a page
        $pdf->AddPage();

// column titles
        $header = array('Student Name', 'School', 'Activity', 'Date', 'Attend');

// print colored table
        // Colors, line width and bold font
        $pdf->SetFillColor(255, 0, 0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(128, 0, 0);
        $pdf->SetLineWidth(0.3);
        $pdf->SetFont('', 'B');
        // Header
        $w = array(60, 40, 40, 25, 15);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $pdf->Ln();
        // Color and font restoration
        $pdf->SetFillColor(224, 235, 255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('','',10);
        // Data
        $fill = 0;



            foreach ($data['list'] as $row) {

                if ($row['attendance'])
                    $attendance = "Y";
                else
                    $attendance = "N";

                $pdf->Cell($w[0], 6, $row['student'], 'LR', 0, 'L', $fill);
                $pdf->Cell($w[1], 6, $row['school'], 'LR', 0, 'L', $fill);
                $pdf->Cell($w[2], 6, $row['activity'], 'LR', 0, 'L', $fill);
                $pdf->Cell($w[3], 6, date_format($row['attendDate'], "m/d/Y"), 'LR', 0, 'L', $fill);
                $pdf->Cell($w[4], 6, $attendance, 'LR', 0, 'L', $fill);
                $pdf->Ln();
                $fill = !$fill;
            }
            $pdf->Cell(array_sum($w), 0, '', 'T');



// ---------------------------------------------------------

// close and output PDF document
        $pdf->Output('AttendanceReport.pdf', 'I');

    }

}