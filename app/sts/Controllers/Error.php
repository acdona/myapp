<?php
namespace App\sts\Controllers;

/**
 * Error controller Responsible for displaying the error page 
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class Error
{

    private array $data;

    public function index()
    {
        
        $this->data = [];
        $viwError = new \App\sts\Models\StsError;
        /** Load View Home */
        $loadView = new \Core\ConfigView("sts/Views/error/error", $this->data);
        $loadView->render();
    }

}

?>