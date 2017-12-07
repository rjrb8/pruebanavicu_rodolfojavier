<?php 
    class Application_Form_Establecimiento extends Zend_Form
	{
	    public function init() {
	
		    $this->setName('establecimientos');
			$id = new Zend_Form_Element_Hidden('id_h');
			$id->addFilter('Int');
			
			//Indicar cada texto
			$nombre = new Zend_Form_Element_Text('nombre_h');
			$nombre->setLabel('Nombre del Hotel')
			       ->setRequired(true)
                   ->addFilter('StripTags')
                   ->addFilter('StringTrim')
                   ->addValidator('NotEmpty');
			
			$ubicacion = new Zend_Form_Element_Text('ubicacion');
			$ubicacion->setLabel('Ubicacion')
			       ->setRequired(true)
                   ->addFilter('StripTags')
                   ->addFilter('StringTrim')
                   ->addValidator('NotEmpty');
				   
			$tipo_hotel = new Zend_Form_Element_Select('tipo_hotel');
			$tipo_hotel->setLabel('Tipo de Hotel')
			           ->addMultiOptions(array(
					     'Hoteles' => 'Hoteles',
					     'Posadas' => 'Posadas',
					     'Hostales' => 'Hostales',
						 'Otros' => 'Otros'));
			
			$fecha_i = new Zend_Form_Element_Text('fecha_i');
			$fecha_i->setLabel('Fecha de Inaguracion')
			       ->setRequired(true)
                   ->addFilter('StripTags')
                   ->addFilter('StringTrim')
                   ->addValidator('NotEmpty');
  
		    //Indicar el boton
			$submit = new Zend_Form_Element_Submit('submit');
			$submit->setAttrib('id', 'submitbutton');
			$usuario = new Application_Model_DbTable_Mostrar();
			$listado_usuario = $usuario->getUsuarioList();
			$listar = new Zend_Form_Element_Select('usuarios');
			$listar->setLabel('Usuario')
			       ->addMultiOptions($listado_usuario);
			$this->addElements(array($id, $nombre, $ubicacion, $fecha_i, $tipo_hotel ,$listar, $submit));	 
		}
	}