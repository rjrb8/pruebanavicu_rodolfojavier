<?php
    class EstablecimientoController extends Zend_Controller_Action
    {
	    public function init() {
		
		}
	 
	    public function tipoAction()  {
		    $tipos = new Application_Model_DbTable_Establecimiento();
			$this->view->titulo = 'Establecimiento';
			$this->view->hotel = $tipos->getJoin(); 
		}
		
		public function addAction() {
			
		    $form_tipo = new Application_Form_Establecimiento();
			$form_tipo->submit->setLabel('Agregar Establecimiento');
			$this->view->form_tipo = $form_tipo;
			
			if ($this->getRequest()->isPost()) {
			    $formData = $this->getRequest()->getPost();
				if ($form_tipo->isValid($formData)) {
				    $nombre = $form_tipo->getValue('nombre_h');
					$ubicacion = $form_tipo->getValue('ubicacion');
					$tipo_hotel = $form_tipo->getValue('tipo_hotel');
					$fecha_i = $form_tipo->getValue('fecha_i');
					$usuarios = $form_tipo->getValue('usuarios');
					$tipos = new Application_Model_DbTable_Establecimiento();
					$tipos->addEstablecimiento($nombre, $ubicacion, $tipo_hotel, $fecha_i, $usuarios);
					$this->_helper->redirector('tipo');    
				} else {
				    $form_tipo->populate($formData);
				}
			}
		}
		
		public function putAction() {
		    $this->view->titulo = "Modificar un Establecimiento";
		    $form_edit = new Application_Form_Establecimiento();
			$form_edit->submit->setLabel('Modificar Establecimiento');
			$this->view->form_edit = $form_edit;
		    if ($this->getRequest()->isPost()) {
			    $formData = $this->getRequest()->getPost();
				if ($form_edit->isValid($formData)) {
				    $id = (int)$form_edit->getValue('id_h');
					$nombre = $form_edit->getValue('nombre_h');
					$ubicacion = $form_edit->getValue('ubicacion');
					$tipo_hotel = $form_edit->getValue('tipo_hotel');
					$fecha_i = $form_edit->getValue('fecha_i');
					$usuarios = $form_edit->getValue('usuarios');
					$tipo = new Application_Model_DbTable_Establecimiento();
					$tipo->putEstablecimiento($id, $nombre, $ubicacion, $tipo_hotel, $fecha_i, $usuarios);
					$this->_helper->redirector('tipo');
				} else {
				    $form_edit->populate($formData);
				}	
			} else {
			    $id = $this->_getParam('id', 0);
				if ($id > 0) {
				    $tipo = new Application_Model_DbTable_Establecimiento();
					$form_edit->populate($tipo->getEstablecimiento($id));
				}
			}
		}
		
		public function deleteAction() {
		
		    $this->view->titulo = "Borrar un Establecimiento";
		    if ($this->getRequest()->isPost()) {
			    $del = $this->getRequest()->getPost('del');
				if ($del == 'Si') {
				    $id = $this->getRequest()->getPost('id');
					$tipos = new Application_Model_DbTable_Establecimiento();
					$tipos->deleteEstablecimiento($id);
					$this->_helper->redirector('tipo');
				} else {
				    $this->_helper->redirector('tipo');
				}
			} else {
				    $id = $this->_getParam('id', 0);
					$tipos = new Application_Model_DbTable_Establecimiento();
					$this->view->usuario_delete = $tipos->getEstablecimiento($id);
			}
		}
	}	