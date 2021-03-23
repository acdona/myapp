<?php
namespace Core;

/**
 * ConfigView class responsible for loading the view 
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public 
 *
*/
class ConfigView
{

       /** @var string $name Receives the VIEW address that should be loaded */
       private string $name;
       /** @var array $data Receive data to send VIEW */
       private array $data;
   
        /**
        * Receive the VIEW address and data.
        * @param string $name View addres that should be loaded
        * @param array $data Data that VIEW should receive.
        */
       public function __construct($name, array $data = null)
       {
           $this->name = $name; 
           $this->data = $data;
         
       }
   
        /**
        * Loaf the VIEW.
        * Check that the file exists. If it exists, charge it, if it doesn't stop charging.
        * 
        * @return void
        */
       public function render() {
           if(file_exists('app/' . $this->name . '.php')){
               include 'app/sts/Views/include/header.php';
               include 'app/sts/Views/include/sidebar.php';
               include 'app/sts/Views/include/menu.php';
               include 'app/' . $this->name . '.php';
               include 'app/sts/Views/include/footer.php';
               include 'app/sts/Views/include/libraries_js.php';
           } else {
               // die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato com o administrador " . EMAILADM . "<br>");
              echo "Erro ao carregar a view: {$this->name}";
              // when finished delete the lines above -> only  development version
              // $urlRedirect = URL . "error/index";
              // header("Location: $urlRedirect");
           }
       }

}

?>