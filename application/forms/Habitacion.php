<?php 
    class Application_Form_Habitacion extends Zend_Form
	{
	    public function init() {
	
		    $this->setName('habitaciones');
			$this->setAttrib('enctype', 'multipart/form-data');
			$id = new Zend_Form_Element_Hidden('id_hb');
			$id->addFilter('Int');
			
			//Indicar cada texto
			$nombre_hb = new Zend_Form_Element_Text('nombre_hb');
			$nombre_hb->setLabel('Nombre de la Habitacion')
			       ->setRequired(true)
                   ->addFilter('StripTags')
                   ->addFilter('StringTrim')
                   ->addValidator('NotEmpty');
			
			$tarifa = new Zend_Form_Element_Text('tarifa');
			$tarifa->setLabel('Tarifa')
			       ->setRequired(true)
                   ->addFilter('StripTags')
                   ->addFilter('StringTrim')
                   ->addValidator('NotEmpty');
				   
			$maxp = new Zend_Form_Element_Text('maxp');
			$maxp->setLabel('Maximo de personas')
			       ->setRequired(true)
                   ->addFilter('StripTags')
                   ->addFilter('StringTrim')
                   ->addValidator('NotEmpty');
			
			//Crear el objeto para registrar la imagen
			$img = new Zend_Form_Element_File('img');
			$img->setLabel('Seleccione la imagen de la habitacion')
			    ->setRequired(true)
				->addValidator('Extension', false, 'jpg,png,gif');
  
		    //Indicar el boton
			$submit = new Zend_Form_Element_Submit('submit');
			$submit->setAttrib('id', 'submitbutton');
			
			$this->addElements(array($id, $nombre_hb, $tarifa, $maxp, $img , $submit));	 
		}
	}