<?php
namespace Core;

/**
 * ConfigController responsible for receiving and handling the url. 
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class ConfigController extends Config
{

    /** @var string $url Receives the URL from .htaccess. */
    private string $url;
    
    /** @var array $urlSet Receives the URL converted to an array. */
    private array $urlSet;

    /** @var string $urlController Receives the controller name from the URL. */
    private string $urlController;

     /** @var string $urlMethod Receives the method name from de URL. */
     private string $urlMethod;

     /** @var string $urlParameter Receives the parameter name form de URL. */
     private string $urlParameter;

     /** @var string $slugController Receives the controller name converted by slug. */
    private string $slugController;

    /** @var array $slugMethod Receives method name converted by slug.   */
    private string $slugMethod;

     /** @var array $urlClear Clear special characters from url. */
     private string $urlClear;

    /** @var array $format Receives the array of special characters that must be replaced.  */
    private array $format;

    private $class;

    /**  Executes when it is instantiated. */
    public function __construct() {

        /**Instance the config for Global Constants. */
        $this->configSts();
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);            
    
            $this->url = $this->clearUrl($this->url);     
    
            
            $this->urlSet = explode("/", $this->url);


            if (isset($this->urlSet[0])) {
                $this->urlController = $this->slugController($this->urlSet[0]);
    
            } else {
                $this->urlController = $this->slugController(CONTROLLER);
            }

            if (isset($this->urlSet[1])) {
                $this->urlMethod = $this->slugMethod($this->urlSet[1]);
    
            } else {
                $this->urlController = $this->slugController(CONTROLLER);
                $this->urlMethod = $this->slugMethod(METHOD);
            }

            if (isset($this->urlSet[2])) {
                $this->urlParameter = $this->urlSet[2];
    
            } else {
                $this->urlParameter = "";
    
            }
        } else {

            $this->urlController = $this->slugController(CONTROLLER);
  
            $this->urlMethod = $this->slugMethod(METHOD);
  
            $this->urlParameter = "";
     
        }
    }
   
    private function slugController($slugController) {
        // Convert to lowercase
        $this->slugController = strtolower($slugController);
        // Convert to hyphen the blanck space
        $this->slugController = str_replace("-", " ", $this->slugController);
        // Convert the first letter of each word to uppercase
        $this->slugController = ucwords($this->slugController);
        // remove white space
        $this->slugController = str_replace(" ", "", $this->slugController);

        return $this->slugController;
    }

    private function slugMethod($slugMethod) {
        $this->slugMethod = $this->slugController($slugMethod);
        //Convert the first letter to lowercase
        $this->slugMethod = lcfirst($this->slugMethod);

        return $this->slugMethod;
    }

    private function clearUrl($url) {
        // Remove all HTML and PHP tags.
        $this->urlClear = strip_tags($url);
        // Remove white spaces
        $this->urlClear = trim($this->urlClear);
        // Remove slash at the end of the URL
        $this->urlClear = rtrim($this->urlClear, "/");
        // Replacement blocks
        $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª´`¨|^ ';
        $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr--------------------------------------';
        $this->urlClear = strtr(utf8_decode($this->urlClear), utf8_decode($this->format['a']), $this->format['b']);

        return $this->urlClear;
    }

    /**
     * Loading Controllers.
     * Instantiate the controller classes and load the index method
     * 
     * @return void
     */
    public function load(): void {
  
        $this->class = "\\App\\sts\\Controllers\\" . $this->urlController;
          
        if(class_exists($this->class)) {  
            $this->loadClass();
        } else {
            $this->urlController = $this->slugController(CONTROLLERERROR);
            $this->load();
        }
       
    }

    private function loadClass() {
        $loadClass = new $this->class();
        if(method_exists($loadClass, "index")) {
            $loadClass->index();
        } else {
            die('Erro: Por favor tente novamente. Caso o problema persista, entre em contato com o administrador ' . EMAILADM . '<br>');
        }
        
    }


}   

?>