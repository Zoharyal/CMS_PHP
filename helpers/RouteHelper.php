<?php
/**
 * 
 */

class RouteHelper
{
    const CLASS_SUFFIX = 'Controller';
    static public function getRoute()
    {
        $baseUri = $_SERVER["REQUEST_URI"];
        $baseUri = substr($baseUri, 1);
        $uris = explode('/', $baseUri);
        $uris[0] = $uris[0] . self::CLASS_SUFFIX;
        if (count($uris) !== 2) {
            throw new \Exception("Error");
        }
        self::executeAction($uris);
    }

    static public function executeAction($uris) 
    {
        // @TODO catch exception coming from autoloader
        // Execute methode controller + affichage resultat
        ucfirst($uris[0])::{$uris[1]}();
    }
    
}