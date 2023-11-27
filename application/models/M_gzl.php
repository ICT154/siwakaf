<?php


defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class M_gzl extends CI_Model
{
    function generatePDF($outputFilename, $htmlContent)
    {
        // Initialize Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);

        // Load HTML content
        $dompdf->loadHtml($htmlContent);

        // Set paper size (e.g., 'A4', 'letter', 'legal')
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (first pass to get total pages)
        try {
            $dompdf->render();
            $dompdf->stream($outputFilename, array('Attachment' => 0));
        } catch (\Exception $e) {
            // Handle rendering errors
            die('Error rendering PDF: ' . $e->getMessage());
        };

        // Output PDF to file or browser


        // Save PDF to a file if needed
        // file_put_contents($outputFilename, $dompdf->output());
    }
}

/* End of file M_gzl.php */
