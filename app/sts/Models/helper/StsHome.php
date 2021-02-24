<?php
namespace App\sts\Models;



/**
 * StsHome Models Responsible for homepage 
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class StsHome
{

    private array $data;

    public function index()
    {
        $this->data=[];
        
        echo "Carregou a models";

        return $this->data;
    }

}

?>