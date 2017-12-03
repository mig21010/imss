<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*es necesario obtener la libreria tcpdf e ingresarla en la carpeta libraries
*/
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends Tcpdf
{
    function __construct()
    {
        parent::__construct();
    }
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */