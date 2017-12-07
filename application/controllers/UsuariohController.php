<?php
    class UsuariohController extends Zend_Controller_Action
    {
	    public function init() {
		
		}
	 
	    public function tipoAction()  {
		    $tipos = new Application_Model_DbTable_Usuarioh();
			$this->view->titulo = 'Usuarios';
			$this->view->usuario = $tipos->fetchAll();
		}
		
		public function addAction() {
			
		    $form_tipo = new Application_Form_Usuarioh();
			$form_tipo->submit->setLabel('Agregar Usuario');
			$this->view->form_tipo = $form_tipo;
			
			if ($this->getRequest()->isPost()) {
			    $formData = $this->getRequest()->getPost();
				if ($form_tipo->isValid($formData)) {
				    $nombre = $form_tipo->getValue('nombre');
					$apellido = $form_tipo->getValue('apellido');
					$fecha_nac = $form_tipo->getValue('fecha_nac');
					$correo = $form_tipo->getValue('correo');
					$tipos = new Application_Model_DbTable_Usuarioh();
					$tipos->addUsuarioh($nombre, $apellido, $fecha_nac, $correo);
					$this->_helper->redirector('tipo');
				} else {
				   $form_tipo->populate($formData);
				}
			}
		}
		
		public function putAction() {
		    $this->view->titulo = "Modificar un usuario";
		    $form_edit = new Application_Form_Usuarioh();
			$form_edit->submit->setLabel('Modificar Usuario');
			$this->view->form_edit = $form_edit;
		    if ($this->getRequest()->isPost()) {
			    $formData = $this->getRequest()->getPost();
				if ($form_edit->isValid($formData)) {
				    $id = (int)$form_edit->getValue('id_u');
					$id = $form_edit->getValue('id_u');
					$nombre = $form_edit->getValue('nombre');
					$apellido = $form_edit->getValue('apellido');
					$fecha_nac = $form_edit->getValue('fecha_nac');
					$correo = $form_edit->getValue('correo');
					$tipo = new Application_Model_DbTable_Usuarioh();
					$tipo->putUsuarioh($id, $nombre, $apellido, $fecha_nac, $correo);
					$this->_helper->redirector('tipo');
				} else {
				    $form_edit->populate($formData);
				}	
			} else {
			    $id = $this->_getParam('id', 0);
				if ($id > 0) {
				    $tipo = new Application_Model_DbTable_Usuarioh();
					$form_edit->populate($tipo->getUsuarioh($id));
				}
			}
		}
		
		public function deleteAction() {
		
		    $this->view->titulo = "Borrar un Usuario";
		    if ($this->getRequest()->isPost()) {
			    $del = $this->getRequest()->getPost('del');
				if ($del == 'Si') {
				    $id = $this->getRequest()->getPost('id');
					$tipos = new Application_Model_DbTable_Usuarioh();
					$tipos->deleteUsuarioh($id);
					$this->_helper->redirector('tipo');
				} else {
				    $this->_helper->redirector('tipo');
				}
			} else {
				    $id = $this->_getParam('id', 0);
					$tipos = new Application_Model_DbTable_Usuarioh();
					$this->view->usuario_delete = $tipos->getUsuarioh($id);
			}
		}
	}	