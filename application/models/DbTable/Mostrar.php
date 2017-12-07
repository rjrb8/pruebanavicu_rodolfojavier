<?php
    class Application_Model_DbTable_Mostrar extends Zend_Db_Table_Abstract
	{
	    protected $_name = 'usuario_hotelero';
		
		public function getUsuarioList()
		{
		    $select = $this->_db->select()
			          ->from($this->_name,
					    array('key' => 'id_u', 'value' => 'nombre')
					  );
			$result = $this->getAdapter()->fetchAll($select);
			return $result;
		}
	    
	}
