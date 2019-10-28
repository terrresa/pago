<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;
use Application\Repository\MarcaRepository;
use Application\Repository\ProductoRepository;
use Application\Repository\ClienteRepository;
use Application\Repository\ColorRepository;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\FormPruebas;
use Zend\Validator;
use Zend\I18n\Validator as I18Validator;

class IndexController extends AbstractActionController
{
    /**
     * @var MarcaRepository
     */
    protected $marcaRepository;
    
    /**
     * @var ProductoRepository
     */
    protected $productoRepository;
    
     /**
     * @var ClienteRepository
     */
    protected $clienteRepository;
    
      /**
     * @var ColorRepository
     */
    protected $colorRepository;

    /**
     * IndexController constructor.
     * @param MarcaRepository $marcaRepository
     */
    
    /**
     * IndexController constructor.
     * @param ProductoRepository $productoRepository
     */
    
    /**
     * IndexController constructor.
     * @param ClienteRepository $clienteRepository
     */
    
      /**
     * IndexController constructor.
     * @param ColorRepository $colorRepository
     */
    public function __construct(MarcaRepository $marcaRepository, ProductoRepository $productoRepository, ClienteRepository $clienteRepository, ColorRepository $colorRepository )
    {
        $this->marcaRepository = $marcaRepository;
        $this->productoRepository = $productoRepository;
        $this->clienteRepository = $clienteRepository;
        $this->colorRepository = $colorRepository;
    }

    public function indexAction()
    {
        $marcas = $this->marcaRepository->listar();
        $productos = $this->productoRepository->listarProducto();
        $clientes = $this->clienteRepository->listar();
        $colores = $this->colorRepository->listar();
        return new ViewModel([
            'marcas' => $marcas,
             'productos'=> $productos, 
             'clientes'=> $clientes, 
             'colores'=> $colores 
        ]);
        
        
    }
    
    public function helloAction(){
        
        echo "hola mundo desde helloAction";
        die();
        
    }
    
    public function formAction(){
    $dbAdapter = $this->getEvent()->getApplication()->getServiceManager()->get("Zend\Db\Adapter\Adapter");
//        $dbAdapter = $this->getServiceLocator()->get("Zend\Db\Adapter\Adapter");
        $form = new FormPruebas("form");
        
        $view = array(
           "title" => "Formulario con Zend Framework2",
            "form" => $form,   
        );
        
        if($this->request->isPost()){
            
            $form->setData($this->request->getPost());
            if(!$form->isValid()){
                $errors = $form->getMessages();
                $view["errors"] = $errors;
                
            }
            
        }
        
        return new ViewModel($view);
    }
    
    
    
    public function getFormDataAction(){
        
//        $request = $this->getRequest();
//        
//        $nombre = $request->getPost('nombre');
//        
//        var_dump($nombre);
//        exit;
        
       if($this->request->getPost("submit")){
           
           $data = $this->request->getPost();
           $email = new Validator\EmailAddress();
           $email->setMessage("El email %value% no es correcto");
           $validate_email = $email->isValid($this->request->getPost("email"));
           
           $alpha = new I18Validator\Alpha;
           $alpha->setMessage("el nombre %value% no son solo letras");
           $validate_alpha = $alpha->isValid($this->request->getPost("nombre"));
           
           if($validate_email==true && $validate_alpha == true){
               $validate  = "Validacion de datos correcta";
           }else{
               $validate  = array(
                   $email->getMessages(),
                   $alpha->getMessages()    
               );
               var_dump($validate);
           }
           
           var_dump($data);
           die();
           
       }else{
       $this->redirect()->toUrl($this->getRequest()->getBaseUrl()."/application/form");
       }
    
     }
     
     
     
     
}
