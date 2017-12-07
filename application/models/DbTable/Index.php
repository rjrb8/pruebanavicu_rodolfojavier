<?php
    class Application_Model_DbTable_Index extends Zend_Db_Table_Abstract
	{
	    protected $_name = 'habitacion';

		public function getJoin() {
		    $select = $this->_db->select()->from('establecimiento')
			     ->joinInner('usuario_hotelero', 'establecimiento.id_u = usuario_hotelero.id_u')
			     ->joinInner('habitacion', 'establecimiento.id_h = habitacion.id_h');
		    return $select->getAdapter()->fetchAll($select);
		}
		
		
	    
	}
