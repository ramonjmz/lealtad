<?php
class UsersController extends Zend_Controller_Action
{
	
	public function init(){
		
	}
	
	public function indexAction(){
		
		$model = new Application_Model_Users();
		$posts = $model->getAll();
		
		Zend_View_Helper_PaginationControl::setDefaultViewPartial('paginator/items.phtml');
		$paginator = Zend_Paginator::factory($posts);
		
		if ($this->_hasParam('page')) {
			$paginator->setCurrentPageNumber($this->_getParam('page'));
		}
		
		$this->view->paginator = $paginator;
	}
	
	public function createAction(){
		
		$form = new Application_Form_User();
		
		if ($this->getRequest()->isPost()) {
		
			if ($form->isValid($this->_getAllParams())) {
				$model = new Application_Model_Users();
				$model->save($form->getValues());
				return $this->_redirect('/users');
			}
		}
		
		
		$this->view->form = $form;
		
	}
	
	public function updateAction(){
		
		if (!$this->_hasParam('id')) {
			return $this->_redirect('/users');
		}
		
		
		$form = new Application_Form_User();
		$posts = new Application_Model_Users();
		
		if ($this->getRequest()->isPost()) {
		
			if ($form->isValid($this->_getAllParams())) {
				$model = new Application_Model_Users();
				$model->save($form->getValues(), $this->_getParam('id'));
				return $this->_redirect('/users');
			}
		} else {
		
			$row = $posts->getRow($this->_getParam('id'));
			if ($row) {
				$form->populate($row->toArray());
			}
		}
		
		$this->view->form = $form;
	}
	 
	
	public function deleteAction(){

		if (!$this->_hasParam('id')) {
			return $this->_redirect('/users');
		}
		
		$posts = new Application_Model_Users();
		$row = $posts->getRow($this->_getParam('id'));
		
		if ($row) {
			$row->delete();
		}
		return $this->_redirect('/users');
	}
	
	 
} 