<?php
//pdf.php;
require_once 'dompdf/vendor/autoload.php';
use Dompdf\Dompdf;
class Pdf extends Dompdf{
 public function __construct() {
        parent::__construct();
    }
}
?>
