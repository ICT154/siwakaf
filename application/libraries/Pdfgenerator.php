<?php
defined('BASEPATH') or exit('No direct script access allowed');
// panggil autoload dompdf nya
require_once 'dompdf-master/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator
{
    // public function generate($html, $filename = '', $paper = '', $orientation = '', $stream = TRUE)
    // {
    //     $options = new Options();
    //     $options->set('isRemoteEnabled', TRUE);
    //     $dompdf = new Dompdf($options);
    //     $dompdf->loadHtml($html);
    //     $dompdf->setPaper($paper, $orientation);
    //     $dompdf->render();
    //     ob_end_clean();
    //     if ($stream) {
    //         // ob_end_clean();
    //         $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
    //     } else {
    //         return $dompdf->output();
    //     }
    // }

    function GeneratePdf()
    {
        $this->load->view('welcome_message');
        $html = $this->output->get_output();
        // Load pdf library
        $this->load->library('pdf');
        $this->pdf->loadHtml($html);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->render();
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("html_contents.pdf", array("Attachment" => 0));
    }
}