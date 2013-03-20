<?php

class SoapcController extends Zend_Controller_Action
{
	protected  $client;
	
	
	public function init(){
		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		$this->client = new Zend_Soap_Client('http://lealtad.local/soaps?wsdl',array());
	}
	
	public function indexAction(){
		
		$result = $this->client->sum(5,1);
		$this->getResponse()->setHeader('Content-Type','text/xml; Charset=UTF-8');
		echo $this->client->getLastResponse();
	}
	
	public function testAction(){
	
		$result = $this->client->helloworld();
    	 $this->getResponse()->setHeader('Content-Type','text/xml; Charset=UTF-8');
		echo $this->client->getLastResponse();
	}
} 