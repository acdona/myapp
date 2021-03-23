<?php
namespace App\sts\Models;

/**
 * StsError Models Responsible for errorpage 
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class StsError
{

    /** @var array $dataError Receives data that is returned from the database */
    private array $dataError;

    public function index() {
        
        // $viewError = new \App\sts\Models\helper\StsRead();
        // $viewError->fullRead("SELECT title_error, description, image_error
        //         FROM sts_errors
        //         LIMIT :limit", "limit=1");
        // $this->dataError = $viewError->getResult();
        // return $this->dataError[0];
        echo "Passou pela Models de Erro!";
        return;
    }

}

?>
    
