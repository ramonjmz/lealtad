<?php

class SoapsController extends Zend_Controller_Action
{
    public function preDispatch()
    {
     
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout->disableLayout();
    }

   
    
    public function indexAction()
    {
    	if(isset($_GET['wsdl'])) {
    		/**
    		 * Create wsdl file
    		 */
    		$autodiscover = new Zend_Soap_AutoDiscover();
    		$autodiscover->setClass('Application_Model_Test');
    		$autodiscover->handle();
    	} else {
    		/**
    		 * Provide SOAP server
    		 */
    		error_log("else");
    		$wsdl = 'http://' . $_SERVER['HTTP_HOST'] . '/soaps?wsdl';
    		
    		$soap = new Zend_Soap_Server($wsdl, array('soap_version' => SOAP_1_1));
     		$soap->setEncoding('utf-8');
     		$soap->setClass('Application_Model_Test');
    		$soap->handle();
    	}
    }
    
    
}
 
