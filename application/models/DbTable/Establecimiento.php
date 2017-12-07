<?php
    class Application_Model_DbTable_Establecimiento extends Zend_Db_Table_Abstract
	{
	    protected $_name = 'establecimiento';
		
		public function getEstablecimiento($id) {
		    $id = (int)$id;
			$row = $this->fetchRow('id_h = '.$id);
			if (!$row) {
			    throw new Exception("No se encuentra la fila con el id $id");
			}
			return $row->toArray();
		}
		
		public function getJoin() {
		    $select = $this->_db->select()->from('establecimiento')
			     ->joinInner('usuario_hotelero', 'establecimiento.id_u = usuario_hotelero.id_u');
		
		    return $select->getAdapter()->fetchAll($select);
		}
		
		public function addEstablecimiento ($nombre, $ubicacion, $tipo_hotel, $fecha_i, $usuarios) {
		    $data = array(
			    'nombre_h' => $nombre,
                'ubicacion' => $ubicacion,				
                'tipo_h' => $tipo_hotel,				
                'fecha_i' => $fecha_i,
                'id_u' => $usuarios,				
			);
		    echo $this->insert($data);
		}
		
		public function deleteEstablecimiento($id) {
			$this->delete('id_h ='. (int)$id);
		}
		
		
		public function putEstablecimiento($id, $nombre, $ubicacion, $tipo_hotel, $fecha_i, $usuarios) {
		    $data = array(
			    'nombre_h' => $nombre,
                'ubicacion' => $ubicacion,				
                'tipo_h' => $tipo_hotel,				
                'fecha_i' => $fecha_i,
                'id_u' => $usuarios,				
			);
			$this->update($data, 'id_h = '.(int)$id);
		}
	    
	}
