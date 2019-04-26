<?php 
include_once("../includes/fpdf/fpdf.php");
include_once("../admin/includes/config.php");
$query = $conn->query("SELECT * FROM `tbl_transaction` NATURAL JOIN `tbl_guest` WHERE `transaction_id` LIKE $_REQUEST[transaction_id] ") or die(mysql_error());
$fetch = $query->fetch_array();
class myPDF extends FPDF
{
	function header()
	{
		$this->Image('../images/logo.png',82,56);
		$this->Ln(12);
		$this->SetFont('Arial','',26);
		$this->Cell(196,5,'Hotel Rwanda',0,0,'C');
		$this->Ln();
		$this->AddFont('Calligrapher','','Calligra.php');
		$this->SetFont('Calligrapher','U',12);
		$this->SetTextColor(9,9,9);
		$this->Cell(196,10,'P.O. Box 164, Narok - Kenya.',0,0,'C');
		$this->Ln(14);
	}

	function footer()
	{
		date_default_timezone_set("Africa/Nairobi");
		$datePrint=date("d-m-Y");
		$time = date("h:i:sa");
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'L');
		$this->Cell(0,10,'Date Printed : '.$datePrint. ' '.$time,0,0,'R');
	}

	function headerTable($conn)
	{
		//Reservation date and name
		$query = $conn->query("SELECT * FROM `tbl_transaction` NATURAL JOIN `tbl_guest` WHERE `transaction_id` LIKE $_REQUEST[transaction_id] ") or die(mysql_error());
		$fetch = $query->fetch_array();

		$this->SetFont("Times","I",9);
		$this->Cell(18,7,"RefNo. ",0,0);
		$this->Cell(35,7,": hr-".$fetch['transaction_id'],0,0);
		$this->SetFont("Arial","",9);
		$this->Cell(26,7,"Reservation Date ",0,0);
		$this->Cell(35,7,": ".$fetch['reserve_date'],0,1);
		$this->Cell(18,7,"Guest ",0,0);
		$this->Cell(35,7,": ".$fetch['name'].'  '.$fetch['surname'],0,0);
		$this->Cell(26,7,"Email Address ",0,0);
		$this->Cell(35,7,": ".$fetch['email_id'],0,1);
		$this->Cell(188,4,"",0,1);
		$this->Ln(4);

		//Reservation Details Title
		$this->SetFont("Arial","U",12);
		$this->Cell(35,10,"Reservation Details",0,1);
		//header
		$this->SetFont('Times','B',12);
		$this->Cell(41,10,'Room Type',1,0,'C');
		$this->Cell(22,10,'Room No.',1,0,'C');
		$this->Cell(25,10,'Check in',1,0,'C');
		$this->Cell(13,10,'Days',1,0,'C');
		$this->Cell(25,10,'Check out',1,0,'C');
		$this->Cell(22,10,'Extra bed',1,0,'C');
		$this->Cell(42,10,'Bill',1,1,'C');
		//$this->Cell(18,10,'Payment',1,1,'C');
		//$this->Ln();
	}

	function viewTable($conn)
	{
		$this->SetFont('Times','',12);
		 $query2 = $conn->query("SELECT * FROM `tbl_transaction` NATURAL JOIN `tbl_rooms` WHERE `transaction_id` LIKE $_REQUEST[transaction_id] ") or die(mysql_error());
		$fetch2 = $query2->fetch_array();
			$this->Cell(41,10,$fetch2['room_type'],1,0,'C');
			$this->Cell(22,10,'R-0'.$fetch2['room_label'],1,0,'C');
			$this->Cell(25,10,$fetch2['checkin'],1,0,'C');
			$this->Cell(13,10,$fetch2['days'],1,0,'C');
			$this->Cell(25,10,$fetch2['checkout'],1,0,'C');
			$this->Cell(22,10,$fetch2['extra_bed'],1,0,'C');
			$this->Cell(42,10,'Ksh. '.$fetch2['bill'],1,1,'C');
			$this->Ln(3);

			$this->Cell(155,20,'Stamp ',0,0,'R');
			$this->Cell(35,20,'',1,1,'C');
			//$this->Cell(155,9,'Served By : ',0,0,'R');
			$this->SetFont("Times","I",12);
			//$this->Cell(35,9,'',0,0,'C');
	}
}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A5',0);
$pdf->headerTable($conn);
$pdf->viewTable($conn);
$pdf->Output('',$fetch['name'].'_'.$fetch['surname'].'_'.$fetch['reserve_date'].'.pdf','F');
?>
