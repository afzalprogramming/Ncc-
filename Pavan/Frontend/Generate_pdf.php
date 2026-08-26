<?php
require '../fpdf/fpdf.php';

if (!isset($_GET['id'])) {
    die("Invalid request.");
}

$id = intval($_GET['id']);

require '../include/db.php';

$stmt = $conn->prepare("SELECT * FROM registration WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Record not found.");
}

$data = $result->fetch_assoc();
$stmt->close();
$conn->close();

class NCC_PDF extends FPDF
{
    function Header()
    {
        $this->SetFillColor(0, 26, 94); // dark blue
        $this->Rect(0, 0, 210, 30, 'F');
        $this->SetTextColor(255, 255, 255);
        $this->SetFont('Arial', 'B', 20);
        $this->SetY(9);
        $this->Cell(0, 12, 'WELCOME TO NCC', 0, 1, 'C');
        $this->SetFont('Arial', '', 11);
        $this->Cell(0, 6, 'National Cadet Corps - Registration Form', 0, 1, 'C');
        $this->Ln(10);
        $this->SetTextColor(0, 0, 0);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(120, 120, 120);
        $this->Cell(0, 10, 'This is a system generated document.', 0, 0, 'C');
    }

    function FieldRow($label, $value)
    {
        $this->SetFont('Arial', 'B', 11);
        $this->SetTextColor(0, 26, 94);
        $this->Cell(65, 10, $label, 0, 0);

        $this->SetFont('Arial', '', 11);
        $this->SetTextColor(30, 30, 30);
        $this->MultiCell(0, 10, $value, 0);

        $this->SetDrawColor(220, 220, 220);
        $this->Line(15, $this->GetY(), 195, $this->GetY());
        $this->Ln(2);
    }
}

$pdf = new NCC_PDF();
$pdf->AddPage();
$pdf->SetMargins(15, 15, 15);

$pdf->FieldRow('Full Name:', $data['full_name']);
$pdf->FieldRow('Date of Birth:', $data['date_of_birth']);
$pdf->FieldRow('Nationality:', $data['nationality']);
$pdf->FieldRow('Father/Guardian Name:', $data['father_guardian_name']);
$pdf->FieldRow("Mother's Name:", $data['mother_name']);
$pdf->FieldRow('Full Address:', $data['full_address']);
$pdf->FieldRow('Mobile Number:', $data['mobile_number']);
$pdf->FieldRow('Email ID:', $data['email_id']);
$pdf->FieldRow('Gender:', $data['gender']);
$pdf->FieldRow('Educational Qualification:', $data['educational_qualification']);
$pdf->FieldRow('Marks:', $data['marks']);

$pdf->Output('D', 'NCC_Registration_Form_' . $data['id'] . '.pdf');
exit();
?>