<?php

namespace Application\Form;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\Validator;
use Zend\I18n\Validator as I18nValidator;



class FormPruebasValidator extends InputFilter{
    
    public function __construct() {
        
        $this->add(array(
           "name" => "nombre", 
           "required" => true,
            "filters" => array(
                array("name" => "StripTags"),
                array("name" => "StringTrim")
            ),
            "validators" => array(
                array(
                   "name" => "StringLength",                    
                    "options" => array(
                        "encoding" => "UTF-8",
                        "min" => "5",
                        "max" => "20",
                        "messages" => array(
                        \Zend\Validator\StringLength::INVALID => "Tu nombre esta mal",
                        \Zend\Validator\StringLength::TOO_SHORT => "Tu nombre debe llevar mas de 5 letras",
                        \Zend\Validator\StringLength::TOO_LONG => "Tu nombre debe llevar menos de 5 letras"        
                        )
                    )
                    
                ),
                
                array(
                   "name" => "Alpha" ,                    
                    "options" => array(                       
                        "messages" => array(
                        I18nValidator\Alpha::INVALID => "Tu nombre solo debe tener letras",
                        I18nValidator\Alpha::NOT_ALPHA => "Tu nombre solo debe tener letras",
                        I18nValidator\Alpha::STRING_EMPTY => "Tu nombre no puede estar vacio",    
                        )
                    )
                    
                ),
                
            )
        ));
        
        $this->add(array(
           "name" => "email",
            "required" => true,
            "filters" => array(
                array("name" => "StringTrim")
              ),
            "validators" => array(
                array(
                    "name" => "EmailAddress",
                    "options" => array(
                        "AllowWhiteSpace" => true,
                        "messages" => array(
                        \Zend\Validator\EmailAddress::INVALID_HOSTNAME => "Email no es valido"
                        )
                    )
                )
            )
            
        ));
        
        
    }
    
}