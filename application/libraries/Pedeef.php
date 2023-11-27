<?php

require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';
// require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

use Dompdf\Dompdf;
use Dompdf\Options;

class Pedeef
{
    public function voucher($html = '', $filename = '', $kertas = 'A4', $orientasi = 'lendscape')
    {
        //set options
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);
        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $dompdf->setHttpContext($contxt);
        // instantiate and use the dompdf class
        // $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($kertas, $orientasi);
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        // $dompdf->stream();
        $dompdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
    public function render($html = '', $filename = '', $kertas = 'A4', $orientasi = 'lendscape')
    {
        //set options
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);
        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $dompdf->setHttpContext($contxt);
        // instantiate and use the dompdf class
        // $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($kertas, $orientasi);
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        // $dompdf->stream();
        $dompdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function to_browser($html = '', $filename = '', $kertas = 'A4', $orientasi = 'lendscape')
    {
        //set options
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);
        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $dompdf->setHttpContext($contxt);
        // instantiate and use the dompdf class
        // $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($kertas, $orientasi);
        // Render the HTML as PDF
        $dompdf->render();
        $output = $dompdf->output();

        $CI = &get_instance();

        $CI->output
            ->set_content_type('pdf')
            ->set_output($output);
    }
}
