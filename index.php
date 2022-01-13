<?php

require_once __DIR__ . DIRECTORY_SEPARATOR .'vendor' . DIRECTORY_SEPARATOR .'autoload.php';

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = 'img.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

class Index {

    public function __construct() {

        $PDF = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $PDF->AddPage('P',"A4");
        $content = '<h1>Coucou</h1><p>Test</p>';
        $PDF->writeHTML($content);
        
        $PDF->Output('Test.pdf', 'I');
        // var_dump($PDF);
    }

}

new Index;