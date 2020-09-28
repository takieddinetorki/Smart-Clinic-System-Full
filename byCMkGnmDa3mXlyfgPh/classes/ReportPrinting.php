<?php
require_once '../core/init.php';

use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * Code Written by: Leong
 * File Name: ReportPrinting.php
 * Class Name: ReportPrinting
 * Purpose of the file: Generate reports into PDF
 * Functions included: printPDF
 **/

class ReportPrinting
{
    public static function printPDF($html, $filename, $orientation = "landscape", $paper = "A4")
    {
        $options = new Options();
        $options->set('isPhpEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("$filename", array('Attachment' => 0));
    }
    // by yeasin
    public static function savePDF($html, $file_location, $orientation = "landscape", $paper = "A4")
    {
        $options = new Options();
        $options->set('isPhpEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $pdf = $dompdf->output();
        if ($file_location != null) {
            file_put_contents($file_location, $pdf);
            return true;
        } else return false;
    }
}
