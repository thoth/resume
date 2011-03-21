<?php 
App::import('Vendor','Resume.xtcpdf');  
$tcpdf = new XTCPDF(); 
$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans' 

$tcpdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);
$tcpdf->SetHeaderMargin(5);
$tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$tcpdf->SetAuthor(Configure::read('Resume.name')." at ".Configure::read('Resume.website')); 
$tcpdf->SetAutoPageBreak( false ); 
$tcpdf->setHeaderFont(array($textfont, '', 24)); 
$tcpdf->xheadercolor = array(225,225,225); 
$tcpdf->xheadertext = Configure::read('Resume.name'); 
$tcpdf->xfootertext = Configure::read('Resume.website'); 

// add a page (required with recent versions of tcpdf) 
$tcpdf->AddPage();
$tcpdf->SetCellPadding(0);
$tcpdf->setCellHeightRatio(1);
$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Now you position and print your page content 
// example:  
//$tcpdf->SetTextColor(0, 0, 0); 
//$tcpdf->SetFont($textfont,'B',20); 
//$tcpdf->Cell(0,14, "Hello World", 0,1,'L'); 
// ... 
// etc. 
// see the TCPDF examples  

//debug($content_for_layout); exit();


header("Content-type: application/pdf"); 
$tcpdf->writeHTML($content_for_layout, true, false, true, false, ''); 

$tcpdf->Output('resume-'.Inflector::slug(Configure::read('Resume.name')).'.pdf', 'I'); 
?>