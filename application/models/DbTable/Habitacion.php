<?php
    class Application_Model_DbTable_Habitacion extends Zend_Db_Table_Abstract
	{
	    protected $_name = 'habitacion';
		
		public function getHabitacion($id) {
		    $id = (int)$id;
			$row = $this->fetchRow('id_hb = '.$id);
			if (!$row) {
			    throw new Exception("No se encuentra la fila con el id $id");
			}
			return $row->toArray();
		}
		
		public function getJoin($id) {
		    $select = $this->_db->select()->from('establecimiento')
			     ->joinInner('usuario_hotelero', 'establecimiento.id_u = usuario_hotelero.id_u')
			     ->joinInner('habitacion', 'establecimiento.id_h = habitacion.id_h')
		         ->where("habitacion.id_h = $id");
		    return $select->getAdapter()->fetchAll($select);
		}
		
		public function addHabitacion ($nombre_hb, $tarifa, $maxp, $img, $id_h) {
		    $data = array(
			    'nombre_hb' => $nombre_hb,
                'tarifa' => $tarifa,				
                'maxp' => $maxp,				
                'img' => $img,
                'id_h' => $id_h,				
			);
		    echo $this->insert($data);
		}
		
		public function deleteHabitacion($id) {
			$this->delete('id_hb ='. (int)$id);
		}
		
		
		public function putHabitacion($id, $nombre, $ubicacion, $tipo_hotel, $fecha_i, $usuarios) {
		     $data = array(
			    'nombre_hb' => $nombre_hb,
                'tarifa' => $tarifa,				
                'maxp' => $maxp,				
                'img' => $img,
                'id_h' => $id_h,				
			);
			$this->update($data, 'id_hb = '.(int)$id);
		}
	    
	}
