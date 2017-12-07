<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $tipos = new Application_Model_DbTable_Index();
		$this->view->habitacion = $tipos->getJoin(); 
    }


}







