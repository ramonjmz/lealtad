<?php
class SOAP_Service{
	
	public function __construct($model){
		$this->_model = $model;
			
	}
	
	public function  test (){
		return $this->_model;
		
	}
	
}