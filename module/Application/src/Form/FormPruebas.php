<?php

namespace Application\Form;

use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Captcha;
use Zend\Form\Factory;

class FormPruebas extends Form{
    
    public function __construct($dbAdapter=null,$name = null) {
        
        parent::__construct($name);
        $this->adapter = $dbAdapter;
        $this->setInputFilter(new \Application\Form\FormPruebasValidator());
        
        $this->add(array(
           "name" => "nombre",            
            "options"=> array(
                "label" => "Nombre: "
            ),
            
            "attributes" => array(
                "type" => "text",
                "class" => "form-control"
            )
        ));
        
        $factory = new Factory();
        $email = $factory->createElement(array(
           "type"  => "Email",
            "name" => "email",
            "options" => array(
              "label" => "Email: "  
            ),
            "attributes" => array(
               "class" => "form-control",
                "id" => "email-input"
            )
        ));
        
        $this->add($email);        
      
        $lista =  $factory->createElement(array(
            'type' => 'Select',
            'name' => 'activo',
            'options' => array(
                'label' => 'Activo:',
                'value_options' => array(
                    '3' => 'Si',
                    '4' => 'No',
            ),
        ),
        'attributes' => array(
            'value' => 'si', //marcar por defecto
            'required'=>'required',
            "class"=>"form-control"
            )
        ));
        
         $this->add($lista);
         
         $this->add(array(            
            'type' => 'radio',
            'name' => 'estado',             
            'options' => array(
                'value_options' => array(
                    'publico' => 'Público',
                    'seguidores' => 'Solo seguidores',
           ),
          ),
            'attributes' => array(
            'value' => 'publico', //marcar por defecto a publico
            'required'=>'required'
            )
          ));
         
           $this->add(array(
               'type' => 'Checkbox',
               'name' => 'documento',
               'options' => array(
               'label' => 'Documento',
               'use_hidden_element' => false,
               'checked_value' => 'si',
            )
           ));
        
        $this->add(array(
            "name" => "submit",
            "attributes" => array(
                "type"=> "submit",
                "value" => "Enviar",
                "title" => "Enviar",
                "class"=>"form-control"
            )
        ));
        
        
        
    }
    
}