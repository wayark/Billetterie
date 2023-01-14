<?php
require_once PATH_APPLICATION . "dompdf/autoload.inc.php";

use Dompdf\Dompdf;

class PDFGenerator{

    private $dompdf;
    private $html;

    public function __construct(){
        $this->dompdf = new Dompdf();
        $this->dompdf->set_option('isRemoteEnabled', true);
        $this->dompdf->set_option('isHtml5ParserEnabled', true);
        $this->dompdf->loadHtml('Hello World');
        $this->dompdf->render();
        $this->dompdf->stream("waticket", array("Attachment" => 0));
    }

/*     public function setHTML($filename){
        $this->html = file_get_contents(PATH_VIEWS . $filename);
    }
    public function generatePDF(){
        $this->dompdf->loadHtml('Hello World');
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("codexworld", array("Attachment" => 0));
    }

    public function getPDF(){
        return $this->dompdf->output();
    }

    public function savePDF($filename){
        $this->dompdf->stream($filename);
    }
} */

}