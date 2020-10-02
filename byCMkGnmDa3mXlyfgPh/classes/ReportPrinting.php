<?php
if (getcwd() == 'C:\xampp\htdocs\smartClinicSystem') 
require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';
else if (getcwd() == 'C:\xampp\htdocs\smartClinicSystem\byCMkGnmDa3mXlyfgPh') 
require_once 'core/init.php';
else require_once '../core/init.php';

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
        define("DOMPDF_UNICODE_ENABLED",true);
        $options = new Options();
        $options->set('isPhpEnabled', TRUE);
        $options->setIsRemoteEnabled(true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);

        $dompdf->render();
        //Output the generated PDF to Browser
        // $pdfFile = $dompdf->output();
        // $filepath =  __DIR__."/file.pdf";
        // echo __DIR__;
        // $fp = fopen($filepath, "w");
        // fwrite($fp, $pdfFile);
        // fclose($fp);
        ob_end_clean();
        $dompdf->stream("$filename", array('Attachment' => 1));
        exit;
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
