<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Mpruebas\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
       $id = $this->params()->fromRoute("id","Por defecto");
       $id2 = $this->params()->fromRoute("id2","Por defecto2");
       
//       if($id = "Por defecto"){
//           
//           return $this->redirect()->toUrl(
//            "https://www.google.com/");
//       }
       
//       $this->layout("layout/prueba");
       $this->layout()->parametro="Hola que tal?";
       $this->layout()->title="Plantilla en zend Framework3";
       
       return new ViewModel([
           'mensaje'=> 'mensaje desde el controlador con variable mensaje',
           "id" => $id,
           "id2" => $id2    
       ]);    
      
    }
 
    
    public function helloAction(){
        
        echo "hola mundo desde helloAction";
        die();
        
    }
    
    public function verDatosAjaxAction(){
        
        $view = new ViewModel();
        $view->setTerminal(true);
        
        return $view;
    }
}
