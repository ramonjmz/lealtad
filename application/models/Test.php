<?php

class Application_Model_Test 
{
 	 
    /**
     * Return 'Hello World!'
     * @return string
     */
    public function helloworld()
    {
        return 'Hello World!';
    }

    /**
     * Get the sum of two variables
     * @param int $a
     * @param int $b
     * @return int
     */
    public function sum($a, $b)
    {
    	error_log("entro a suma");
        return $a + $b;
    }
    
     /**
    * This method takes ...
    *
    * @param integer $inputParam1
    * @param string  $inputParam2
    * @return array
    */
    public function function1($inputParam1, $inputParam2) {
    	 return array('sa','sa');
    }
    
    
 	 

}
 