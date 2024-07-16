<?php
// application/models/Journal_model.php
defined('BASEPATH') or exit('No direct script access allowed');

class devis_pdf_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        require_once APPPATH . 'libraries/fpdf185/fpdf.php';
    }

    public function generatePdf($devis)
    {
        // Initialiser le PDF
        $pdf = new FPDF();
        $header = array(
            'Service',
            'Duree',
            'Montant'
        );

        // Ajouter une page
        $pdf->AddPage();

        // Titre
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Devis No. ' . $devis['id']);
        $pdf->Ln(10);

        // En-têtes
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(200, 220, 255);
        $w = array(30, 30, 80);
        // , 25, 25);
        for ($i = 0; $i < count($header); $i++) {
            $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        }
        $pdf->Ln();

        // Données
        $pdf->SetFont('Arial', '', 10);
            $pdf->Cell($w[0], 6, mb_convert_encoding($devis['type_service'], 'ISO-8859-1', 'UTF-8'), 'LR', 0, 'L');
            $pdf->Cell($w[1], 6, mb_convert_encoding($devis['duree']->account_number, 'ISO-8859-1', 'UTF-8'), 'LR', 0, 'L');
            $pdf->Cell($w[2], 6, mb_convert_encoding($devis['montant']->libelle, 'ISO-8859-1', 'UTF-8'), 'LR', 0, 'L');
            $pdf->Ln();
        // Ligne de clôture
        $pdf->Cell(array_sum($w), 0, '', 'T');
        $pdf->Output("devis DD-MM-YYYY", 'F');
    }
}
