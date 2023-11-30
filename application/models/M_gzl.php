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

    function ubahFormatTanggal($tanggalInput)
    {
        // Ubah format tanggal
        $tanggalOutput = date('d F Y', strtotime($tanggalInput));

        return $tanggalOutput;
    }

    function format_tanggal_indonesia($tanggal)
    {
        // Ubah format tanggal menjadi timestamp
        $timestamp = strtotime($tanggal);

        // Buat array dengan nama bulan dalam bahasa Indonesia
        $nama_bulan = array(
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );

        // Ambil nilai tanggal, bulan, dan tahun dari timestamp
        $hari = date('d', $timestamp);
        $bulan = $nama_bulan[date('n', $timestamp) - 1];
        $tahun = date('Y', $timestamp);

        // Buat string dengan format "tanggal bulan tahun"
        $tanggal_indonesia = $hari . ' ' . $bulan . ' ' . $tahun;

        return $tanggal_indonesia;
    }
}

/* End of file M_gzl.php */
