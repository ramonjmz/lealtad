<?php

class Application_Form_User extends Zend_Form {

    public function init() {

        $this->addElement(
                'text', 'id', array(
            'label' => 'UUID',
            'required' => true
                )
        );
        

        $this->addElement(
        		'text', 'user_name', array(
        				'label' => 'Nombre',
        				'required' => true
        		)
        );
        
        $this->addElement(
        		'text', 'first_name', array(
        				'label' => 'Apellido',
        				'required' => true
        		)
        );

        $this->addElement(
        		'text', 'last_name', array(
        				'label' => 'Apellido Materno',
        				'required' => true
        		)
        );
        
        $this->addElement(
                'textarea', 'Description', array(
            'label' => 'Contenido'
                )
        );
    
           
        $this->addElement(
                'submit', 'Guardar', array()
        );
    }

}