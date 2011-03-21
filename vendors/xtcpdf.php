<?php 
App::import('Vendor','Resume.tcpdf/tcpdf'); 

class XTCPDF  extends TCPDF 
{ 

    var $xheadertext  = 'Name'; 
    var $xheadercontact  = 'address, phone, email'; 
    var $xheadercolor = array(0,0,200); 
    var $xfootertext  = 'Copyright å© %d XXXXXXXXXXX. All rights reserved.'; 
    var $xfooterfont  = PDF_FONT_NAME_MAIN ; 
    var $xfooterfontsize = 8 ; 
	
	

    /** 
    * Overwrites the default header 
    * set the text in the view using 
    *    $fpdf->xheadertext = 'YOUR ORGANIZATION'; 
    * set the fill color in the view using 
    *    $fpdf->xheadercolor = array(0,0,100); (r, g, b) 
    * set the font in the view using 
    *    $fpdf->setHeaderFont(array('YourFont','',fontsize)); 
    */ 
    function Header() 
    { 

 /*       
 		list($r, $b, $g) = $this->xheadercolor; 
        $this->setY(10); // shouldn't be needed due to page margin, but helas, otherwise it's at the page top
        $this->SetFillColor($r, $b, $g); 
        $this->SetTextColor(0, 0, 0); 
        $this->Cell(0, 15, $this->xheadertext, 0, 1, 'L', 1); 
        
        $this->setY(10); // shouldn't be needed due to page margin, but helas, otherwise it's at the page top
        $this->Text(0, 15, $this->xheadercontact, false, false, true, false, 2, 'R', 1); 
  */      
        //Contact Info
        //$this->Text(15, 26, ); 
    } 

    /** 
    * Overwrites the default footer 
    * set the text in the view using 
    * $fpdf->xfootertext = 'Copyright å© %d YOUR ORGANIZATION. All rights reserved.'; 
    */ 
    function Footer() 
    { 
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, $this->xfootertext.' | Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T', false, 'R', 0, '', 0, false, 'T', 'M');
    } 
} 
?>