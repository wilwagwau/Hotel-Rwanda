<?php 
include_once("../includes/fpdf/fpdf.php");
include_once("../admin/includes/config.php");
$query = $conn->query("SELECT * FROM `tbl_transaction` ") or die(mysql_error());
$fetch = $query->fetch_array();
class myPDF extends FPDF
{
	function header()
	{
		$this->Ln(5);
		$this->SetFont('Arial','',20);
		$this->Cell(196,5,'Hotel Rwanda',0,0,'C');
		$this->Ln();
		$this->AddFont('Calligrapher','','Calligra.php');
		$this->SetFont('Calligrapher','U',12);
		$this->SetTextColor(9,9,9);
		$this->Cell(196,10,'P.O. Box 164, Narok - Kenya.',0,0,'C');
		$this->Ln(8);
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
        $datePrint=date("d-m-Y");
		$query = $conn->query("SELECT * FROM `tbl_transaction` NATURAL JOIN `tbl_guest` ") or die(mysql_error());
		$fetch = $query->fetch_array();

		$this->SetFont("Times","I",9);
		$this->SetFont("Arial","",9);
		$this->Cell(7,7,"Date ",0,0);
		$this->Cell(14,7,": ".$datePrint,0,1);
		$this->Ln(1);

		//Reservation Details Title
		$this->SetFont("Arial","B",12);
		$this->Cell(35,10,"Transaction Report",0,1);
		//header
		$this->SetFont('Times','B',12);
		$this->Cell(10,10,'Sr.',1,0,'C');
        $this->Cell(37,10,'Name',1,0,'L');
        $this->Cell(37,10,'Room',1,0,'L');
		$this->Cell(25,10,'Check-in',1,0,'L');
		$this->Cell(13,10,'Days',1,0,'L');
		$this->Cell(25,10,'Check-out',1,0,'L');
		$this->Cell(15,10,'E. bed',1,0,'L');
		$this->Cell(30,10,'Bill',1,1,'L');
		//$this->Cell(18,10,'Payment',1,1,'C');
		//$this->Ln();
	}

	function viewTable($conn)
	{
		$this->SetFont('Times','',12);
		$query2 = $conn->query("SELECT * FROM `tbl_transaction` NATURAL JOIN `tbl_rooms` NATURAL JOIN `tbl_guest` WHERE `status` = 'Check out' ORDER BY `transaction_id` ASC  ") or die(mysql_error());
        while($fetch2 = $query2->fetch_array())
        {
            $this->Cell(10,10,$fetch2['transaction_id'],1,0,'C');
			$this->Cell(37,10,$fetch2['name'].' '.$fetch2['surname'],1,0,'L');
			$this->Cell(37,10,'R-0'.$fetch2['room_label'].', '.$fetch2['room_type'],1,0,'L');
			$this->Cell(25,10,$fetch2['checkin'],1,0,'L');
			$this->Cell(13,10,$fetch2['days'],1,0,'L');
			$this->Cell(25,10,$fetch2['checkout'],1,0,'L');
			$this->Cell(15,10,$fetch2['extra_bed'],1,0,'L');
			$this->Cell(30,10,'Ksh. '.$fetch2['bill'].'.00',1,1,'L');
                       
            $this->SetFont("Times","",12);
        }
		$stmt = $conn->query("SELECT * FROM `tbl_transaction` WHERE `status` = 'Check out' ") or die(mysqli_error($conn));
		$stmt1 = $stmt->fetch_array();
        $this->SetFont("Times","B",12);
		$total = 0;
		foreach($stmt as $details){
		  $subtotal = $details['bill'];
		  $total += $subtotal;
		}
		$this->Cell(193,10,'Total : Ksh. '.$total.'.00',0,0,'R');
	}
}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable($conn);
$pdf->viewTable($conn);

$pdf->Output('','Sales_as_at_'.$fetch['reserve_date'].'.pdf','F');
?>
