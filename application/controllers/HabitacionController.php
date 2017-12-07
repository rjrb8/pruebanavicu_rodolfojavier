<?php
    class HabitacionController extends Zend_Controller_Action
    {
	    public function init() {
		
		}
	 
	    public function tipoAction()  {
		    $tipos = new Application_Model_DbTable_Habitacion();
			$id = $this->_getParam('id', 0);
			$this->view->titulo = 'Ver habitaciones del Hotel';
			$this->view->habitacion = $tipos->getJoin($id); 
		}
		
		public function addAction() {
			
		    $form_tipo = new Application_Form_Habitacion();
			$form_tipo->submit->setLabel('Agregar Habitacion');
			$this->view->form_tipo = $form_tipo;
			
			if ($this->getRequest()->isPost()) {
			    $formData = $this->getRequest()->getPost();
				if ($form_tipo->isValid($formData)) {
				    $nombre_hb = $form_tipo->getValue('nombre_hb');
					$tarifa = $form_tipo->getValue('tarifa');
					$maxp = $form_tipo->getValue('maxp');
					$id_h = $this->_getParam('id', 0);
					//Subir archivos
					$subir = new Zend_File_Transfer_Adapter_Http();
					$subir->setDestination(APPLICATION_PATH . '/imgs/hab');
					$subir->addFilter('Rename', APPLICATION_PATH.'/../public/imgs/hab/'.$nombre_hb.'.jpg');
					try {
					    $subir->receive();
					} catch (Zend_File_Transfer_Exception $e) {
					    $e->getMessage();
					}
					
			        $filename = str_replace('C:\xampp\htdocs\navicu\application/../public/', '', $subir->getFileName('img')); 
					
					$tipos = new Application_Model_DbTable_Habitacion();
					$tipos->addHabitacion($nombre_hb, $tarifa, $maxp, $filename, $id_h);
					
				} else {
				    $form_tipo->populate($formData);
				}
			}
		}
		
		public function putAction() {
		    $this->view->titulo = "Modificar un Habitacion";
		    $form_edit = new Application_Form_Habitacion();
			$form_edit->submit->setLabel('Modificar Habitacion');
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
					$tipo = new Application_Model_DbTable_Habitacion();
					$tipo->putHabitacion($id, $nombre, $ubicacion, $tipo_hotel, $fecha_i, $usuarios);
					$this->_helper->redirector('tipo');
				} else {
				    $form_edit->populate($formData);
				}	
			} else {
			    $id = $this->_getParam('id', 0);
				if ($id > 0) {
				    $tipo = new Application_Model_DbTable_Habitacion();
					$form_edit->populate($tipo->getHabitacion($id));
				}
			}
		}
		
		public function deleteAction() {
		
		    $this->view->titulo = "Borrar un Habitacion";
		    if ($this->getRequest()->isPost()) {
			    $del = $this->getRequest()->getPost('del');
				if ($del == 'Si') {
				    $id = $this->getRequest()->getPost('id');
					$tipos = new Application_Model_DbTable_Habitacion();
					$tipos->deleteHabitacion($id);
					$this->_helper->redirector('tipo'); 
				} else {
				    $this->_helper->redirector('tipo');
				}
			} else {
				    $id = $this->_getParam('id', 0);
					$tipos = new Application_Model_DbTable_Habitacion();
					$this->view->usuario_delete = $tipos->getHabitacion($id);
			}
		}
	}	