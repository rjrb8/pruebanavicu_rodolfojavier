<?php 
    class Application_Form_Usuarioh extends Zend_Form
	{
	    public function init() {
	
		    $this->setName('usuario_hotelero');
			$id = new Zend_Form_Element_Hidden('id_u');
			$id->addFilter('Int');
			
			//Indicar cada texto
			$nombre = new Zend_Form_Element_Text('nombre');
			$nombre->setLabel('Nombre')
			       ->setRequired(true)
                   ->addFilter('StripTags')
                   ->addFilter('StringTrim')
                   ->addValidator('NotEmpty');
			
			$apellido = new Zend_Form_Element_Text('apellido');
			$apellido->setLabel('Apellido')
			       ->setRequired(true)
                   ->addFilter('StripTags')
                   ->addFilter('StringTrim')
                   ->addValidator('NotEmpty');
			
			$fecha_nac = new Zend_Form_Element_Text('fecha_nac');
			$fecha_nac->setLabel('Fecha de Nacimiento')
			       ->setRequired(true)
                   ->addFilter('StripTags')
                   ->addFilter('StringTrim')
                   ->addValidator('NotEmpty');
				   
			$correo = new Zend_Form_Element_Text('correo');
			$correo->setLabel('E-mail')
			       ->setRequired(true)
                   ->addFilter('StripTags')
                   ->addFilter('StringTrim')
                   ->addValidator('NotEmpty');
				   
		    //Indicar el boton
			$submit = new Zend_Form_Element_Submit('submit');
			$submit->setAttrib('id', 'submitbutton');
			
			$this->addElements(array($id, $nombre, $apellido, $fecha_nac, $correo, $submit));
			 
		}
	}