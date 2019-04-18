<?php 
include_once '../includes/fpdf/fpdf.php';
include_once("includes/config.php");
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

		$this->SetFont("Times","I",9);
		$this->SetFont("Arial","",9);
		$this->Cell(7,7,"Date ",0,0);
		$this->Cell(14,7,": ".$datePrint,0,1);
		$this->Ln(1);

		//Reservation Details Title
		$this->SetFont("Arial","B",12);
		$this->Cell(35,10,"System Users",0,1);
		//header
		$this->SetFont('Times','B',12);
		$this->Cell(10,10,'Sr.',1,0,'C');
		$this->Cell(44,10,'Name',1,0,'L');
		$this->Cell(33,10,'National ID',1,0,'L');
        $this->Cell(45,10,'Email Address',1,0,'L');
		
		$this->Cell(34,10,'Date Joined',1,0,'L');
		$this->Cell(22,10,'Status',1,1,'L');
		
		//$this->Ln();
	}

	function viewTable($conn)
	{
		$this->SetFont('Times','',12);
		$query2 = $conn->query("SELECT * FROM `tbl_users` WHERE role = 'user' AND `IsDeleted` LIKE b'0' ORDER BY `user_id` ASC  ") or die(mysql_error());
        while($fetch2 = $query2->fetch_array())
        {
            $this->Cell(10,10,$fetch2['user_id'],1,0,'C');
			$this->Cell(44,10,$fetch2['name'].' '.$fetch2['surname'],1,0,'L');
			$this->Cell(33,10,$fetch2['national_id'],1,0,'L');
			$this->Cell(45,10,$fetch2['email_id'],1,0,'L');
		
			$this->Cell(34,10,$fetch2['date_created'],1,0,'L');
			$this->Cell(22,10,$fetch2['status'],1,1,'L');
                     
            $this->SetFont("Times","",12);
		}
		$total = 0;
		$q_users = $conn->query("SELECT COUNT(*) as total FROM `tbl_users` WHERE `role` = 'user'  AND `IsDeleted` LIKE b'0' ") or die(mysqli_error());
		$f_u = $q_users->fetch_array();
		$total = $f_u['total'];
        $this->SetFont("Times","B",12);
		$this->Cell(188,10,'Number of users - '.$total,0,0,'R');
	}
}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable($conn);
$pdf->viewTable($conn);

$pdf->Output('','Sales_as_at_'.$fetch['reserve_date'].'.pdf','F');
?>
