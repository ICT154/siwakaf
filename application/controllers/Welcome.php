<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Welcome extends CI_Controller
{



	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('M_gzl');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html\
	 * 
	 */
	public function index()
	{
		$this->load->view('welcome_message');
		$this->load->library('Pedeef');
	}


	function tes_input()
	{
		$this->load->view('sandbox/input');
	}


	function tester()
	{
		$tes = $this->db->query("describe db_wakaf_v2.t_data_pimpinan ")->result();
		foreach ($tes as $row) {
			$form = '';
			$label = str_replace('_', ' ', $row->Field);
			echo "
<div class='form-group'>
    <label for='' class='col-sm-3 control-label no-padding-right'>" . strtoupper($label) . " : </label>

    <div class='col-sm-9'>
        <input type='text' class='col-xs-10 col-sm-5' id='" . $row->Field . "' name='" . $row->Field . "'
            autocomplete='off' required value='bow->" . $row->Field . "?>'>
</div>
</div>
";
		}
	}

	function tester2()
	{
		$tes = $this->db->query("describe db_wakaf_v2.t_data_pimpinan")->result();
		foreach ($tes as $row) {
			$form = '';
			$label = str_replace('_', ' ', $row->Field);

			$o = "";

			// echo "$" . $o . "obj->" . $row->Field . " = null;<br>";
			// echo '$' . $row->Field . '= htmlspecialchars($this->input->post("' . $row->Field . '")); <br>';
			echo " '" . $row->Field . "' => htmlspecialchars(this->input->post('" . $row->Field . "')), <br>";
		}
	}


	function pdfcoba()
	{
	}

	// function GeneratePdf()
	// {

	// 	$html = $this->output->get_output();
	// 	// Load pdf library
	// 	$this->load->library('pdf');
	// 	$this->pdf->loadHtml($html);
	// 	$this->pdf->setPaper('A4', 'landscape');
	// 	$this->pdf->render();
	// 	// Output the generated PDF (1 = download and 0 = preview)
	// 	$this->pdf->stream("html_contents.pdf", array("Attachment" => 0));
	// }


	public function buat()
	{
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		// title dari pdf
		$this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';

		// filename dari pdf ketika didownload
		$file_pdf = 'laporan_penjualan_toko_kita';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "portrait";

		$html = $this->index();

		// run dompdf
		// ob_end_clean();
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

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
		} catch (\Exception $e) {
			// Handle rendering errors
			die('Error rendering PDF: ' . $e->getMessage());
		};

		// Output PDF to file or browser
		$dompdf->stream($outputFilename, array('Attachment' => 0));

		// Save PDF to a file if needed
		// file_put_contents($outputFilename, $dompdf->output());
	}



	function tes_print()
	{
		$html = $this->load->view('layout/print_data_wakaf',);
		// $html = '<h1>Hello, Dompdf!</h1><p>This is a simple example.</p>';
		try {
			$this->generatePDF("tes", $html);
		} catch (\Throwable $th) {

			echo "<pre>";
			print_r($th);
			echo "</pre>";
		}
		// $this->pdf->render($html);
	}
}
