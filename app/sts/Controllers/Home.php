<?php
namespace App\sts\Controllers;


/**
 *  Home Controller responsible for loading the homepage 
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class Home
{
    
    /** @var array $data Receives the data that must be sent to VIEW*/
    private array $data = [];
    
    /**
     * Instantiate MODELS and receive feedback
     * 
     * @ return void
     */
    public function index() : void {   
      
         /** Load StsHome Models */   
        $home = new \App\sts\Models\StsHome();
        $home->index();

        /** Load View Home */
        $loadView = new \Core\ConfigView("sts/Views/home/home", $this->data);
        $loadView->render();

    }

}

?>