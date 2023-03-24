<?php
	ob_start();
	include('template-payments-pdf.php');
	$content = ob_get_contents();
	ob_end_clean();
	/*
	class MYPDF extends TCPDF {
	    public function Header() {
	        $image_file = 'st_logo.png';
	        $this->SetFont('Arial', 'B', 9);
	        $this->SetTextColor(167, 147, 68);
	        $this->Image($image_file, 11, 3, 50, 15);
	    }
	    public function Footer() {
	        $this->SetY(-10);
	        $this->SetFont('helvetica', 'B', 8);
	        $this->Cell(0, 10, 'https://www.surekhatech.com/', 0, false, 'C', 0, '', 0, false, 'T', 'M');
	    }
	}
	*/
	$name = isset($_GET['pay']) && $_GET['pay'] == 'pay' ? 'concluidos' : 'pendentes';
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION,PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
	$pdf->AddPage('P',"A4");
	$pdf->writeHTML($content);
	$pdf->Output('pagamentos_'.$name.'.pdf');
?>