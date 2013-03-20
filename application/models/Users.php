<?php
class Application_Model_Users extends Zend_Db_Table_Abstract
{
	protected $_name = 'users';
	protected $_primary = 'id';
	 
	public function getRow($id){
		/*
		 * Metodo para  ver el detalle un registro
		 */
		
		$id = (int) $id;
		$row = $this->find( $id )->current();
		return $row;
		
		
	}
	
	public function getAll($wheres = array()){
		
		/*
		 * Metodo paara buscar por clausula o todos los registros
		 
		if(is_array($wheres) && empty($wheres)){
		
		 
			 $query = $this->select()
                ->from( array( 'u'=>'users' ), array('*'))
                ->where('u.name = ?' , $wheres ) // hay que trasformar el array en clausulas wheres
                ->setIntegrityCheck(false);
                
                return $this->fetchAll( $query );
                
			
		}else{

			return $this->fetchAll();
		}
		*/
		
		return $this->fetchAll(
				$this->select()
				->order('date_entered DESC')
				->limit(5)
		);
		
		
	} 
	
	public function save($bind, $id = null){
 
		if( is_null( $id )){
			$row = $this->createRow();
		}else{
			$row = $this->getRow( $id );
		}
		
		$row->setFromArray( $bind );
		return $row->save();
		
	}
}
